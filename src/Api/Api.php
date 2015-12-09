<?php
/**
 * Main entry point to use the API.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Api;

use PortaText\Command\Factory;
use PortaText\Client\Client;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Main entry point to use the API.
 */
class Api
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
     * Client to use.
     *
     * @var PortaText\Client\Client
     */
    protected $client = null;

    /**
     * Execution description (method, command, etc)
     *
     * @var array
     */
    protected $executionDescriptor;

    /**
     * This magic method is used to spawn commands on demand.
     *
     * @param string $name Name of the invoked method.
     * @param array $args Array of arguments for invocation.
     *
     * @return PortaText\Command\ICommand
     * @throws InvalidArgumentException
     */
    public function __call($name, $args = array())
    {
        switch ($name) {
            case "get":
            case "post":
            case "put":
            case "delete":
                $command = $this->executionDescriptor["command"];
                $method = $name;
                $uri = implode("/", array(
                  $this->endpoint, $command->endpoint($method, $args)
                ));
                return $this->client->run($method, $uri, $this->apiKey, $args);
            default:
                $this->executionDescriptor = array(
                  'command' => $this->commandFactory->get($name)
                );
        }
        return $this;
    }

    /**
     * Return client in use.
     *
     * @return PortaText\Client\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Sets the API client to use.
     *
     * @param PortaText\Client\Client $client New injected client.
     *
     * @return PortaText\Api\Api
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

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
        $this->client->setLogger($logger);
        return $this;
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
        $this->client = new Client;
        $this->commandFactory = new Factory;
        $this->apiKey = $apiKey;
        if (is_null($endpoint)) {
            $this->endpoint = self::$DEFAULT_ENDPOINT;
        } else {
            $this->endpoint = $endpoint;
        }
    }
}
