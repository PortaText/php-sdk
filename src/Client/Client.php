<?php
/**
 * All API client implementations should extend this class.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Client;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use PortaText\Command\Factory;
use PortaText\Command\Result;
use PortaText\Exception\RequestError;

/**
 * All API client implementations should extend this class.
 */
class Client implements IClient
{
    /**
     * Default API REST Endpoint.
     *
     * @var string
     */
    public static $DEFAULT_ENDPOINT = "https://rest.portatext.com";

    /**
     * REST endpoint in use.
     *
     * @var string
     */
    protected $endpoint = null;

    /**
     * API Key
     *
     * @var string
     */
    protected $apiKey = null;

    /**
     * Holds the command factory implementation.
     *
     * @var PortaText\Command\IFactory
     */
    protected $commandFactory = null;

    /**
     * Holds the logger implementation.
     *
     * @var Psr\Log\LoggerInterface
     */
    protected $logger = null;

    /**
     * Current command to run.
     *
     * @var PortaText\Command\ICommand
     */
    protected $currentCommand;

    /**
     * Sets the logger implementation.
     *
     * @param Psr\Log\LoggerInterface $logger The PSR3-Logger
     *
     * @return PortaText\Client\Base
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * This magic method is used to spawn commands on demand.
     *
     * @param string $name Name of the invoked method.
     * @param array $args Array of arguments for invocation.
     *
     * @return PortaText\Command\ICommand
     * @throws InvalidArgumentException
     */
    public function __call($name, $args)
    {
        $this->currentcommand = $this->commandFactory->get($name);
        $this->currentcommand->setClient($this);
        return $this->currentcommand;
    }

    /**
     * Runs the given command.
     *
     * @param string $endpoint Endpoint to invoke.
     * @param string $method HTTP method to use.
     * @param string $contentType Content-Type value.
     * @param string $apiKey Your PortaText API Key.
     * @param string $body Payload to send.
     *
     * @return PortaText\Command\Result
     * @throws PortaText\Exception\RequestError
     */
    public function run($endpoint, $method, $contentType, $body)
    {
        $uri = implode("/", array($this->endpoint, $endpoint));
        $this->logger->debug("Calling $method $uri");
        $result = null;
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $uri,
          CURLOPT_HEADER => true,
          CURLOPT_CUSTOMREQUEST => strtoupper($method),
          CURLOPT_USERAGENT => "PortaText PHP SDK",
          CURLOPT_HTTPHEADER => array(
              "X-Api-Key: {$this->apiKey}",
              "Content-Type: $contentType",
              "Accept: application/json"
          ),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYPEER => true,
          CURLOPT_POSTFIELDS => $body
        ));
        $result = curl_exec($curl);
        if ($result === false) {
            $error = curl_error($curl);
            curl_close($curl);
            throw new RequestError($error);
        }
        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        list($preHeaders, $body) = explode("\r\n\r\n", $result, 2);
        list($statusLine, $preHeaders) = explode("\r\n", $preHeaders, 2);
        $preHeaders = explode("\r\n", $preHeaders);
        $headers = array();
        foreach ($preHeaders as $h) {
            list($k, $v) = explode(": ", $h, 2);
            $headers[strtolower($k)] = $v;
        }
        curl_close($curl);
        return new Result($code, $headers, json_decode($body, true));
    }

    /**
     * Class constructor.
     *
     * @param string $apiKey Your PortaText API Key.
     * @param string $endpoint You can optionally specify a different endpoint.
     *
     */
    public function __construct($apiKey, $endpoint = null)
    {
        $this->logger = new NullLogger;
        $this->commandFactory = new Factory;
        $this->apiKey = $apiKey;
        if (is_null($endpoint)) {
            $this->endpoint = self::$DEFAULT_ENDPOINT;
        } else {
            $this->endpoint = $endpoint;
        }
    }
}
