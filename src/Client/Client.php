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
use PortaText\Exception\RequestError;
use PortaText\Command\Result;

/**
 * All API client implementations should extend this class.
 */
class Client
{
    /**
     * Holds the logger implementation.
     *
     * @var Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Current command.
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
     * Runs the given command.
     *
     * @param string $method HTTP method to use.
     * @param string $uri Full URI.
     * @param string $apiKey Your PortaText API Key.
     * @param array $args Endpoint arguments.
     *
     * @return PortaText\Command\Result
     * @throws PortaText\Exception\RequestError
     */
    public function run($method, $uri, $apiKey, $args)
    {
        $this->logger->debug(
            "Calling $method $uri with " . print_r($args, true)
        );
        $result = null;
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $uri,
          CURLOPT_HEADER => true,
          CURLOPT_CUSTOMREQUEST => strtoupper($method),
          CURLOPT_USERAGENT => "PortaText PHP SDK",
          CURLOPT_HTTPHEADER => array(
              "X-Api-Key: $apiKey"
          ),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYPEER => true
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
     *
     */
    public function __construct()
    {
        $this->logger = new NullLogger;
    }
}
