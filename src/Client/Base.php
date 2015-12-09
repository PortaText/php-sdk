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
use PortaText\Exception\ServerError;
use PortaText\Exception\ClientError;
use PortaText\Exception\InvalidCredentials;
use PortaText\Exception\InvalidMedia;
use PortaText\Exception\InvalidMethod;
use PortaText\Exception\Forbidden;
use PortaText\Exception\NotFound;
use PortaText\Exception\PaymentRequired;
use PortaText\Exception\RateLimited;

/**
 * All API client implementations should extend this class.
 */
abstract class Base implements IClient
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
     * Session Token.
     *
     * @var string
     */
    protected $sessionToken = null;

    /**
     * Username and password.
     *
     * @var array
     */
    protected $credentials = null;

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
     * @param string $body Payload to send.
     * @param string $authType One of "apiKey", "sessionToken", or "basic"
     *
     * @return PortaText\Command\Result
     * @throws PortaText\Exception\RequestError
     * @throws PortaText\Exception\ServerError
     * @throws PortaText\Exception\ClientError
     * @throws PortaText\Exception\InvalidCredentials
     * @throws PortaText\Exception\PaymentRequired
     * @throws PortaText\Exception\Forbidden
     * @throws PortaText\Exception\NotFound
     * @throws PortaText\Exception\InvalidMedia
     * @throws PortaText\Exception\InvalidMethod
     * @throws PortaText\Exception\RateLimited
     * @throws InvalidArgumentException
     */
    public function run(
        $endpoint,
        $method,
        $contentType,
        $body,
        $authType = null
    ) {
        $uri = implode("/", array($this->endpoint, $endpoint));
        $result = null;
        /*
         * When there's not a specific auth type defined, try to guess one as
         * follows:
         *   - If there is a session token in use, try to use it.
         *   - If not, but there are credentials specified, try to login and
         *     then retry the request with the new session token.
         *   - If there aren't any session tokens and credentials specified
         *     fallback to the api key.
         */
        if (is_null($authType)) {
            if (is_null($this->sessionToken)) {
                if (!is_null($this->credentials)) {
                    $this->login();
                    $authType = "sessionToken";
                } else {
                    $authType = "apiKey";
                }
            } else {
                $authType = "sessionToken";
            }
        }
        $this->logger->debug("Calling $method $uri with $authType");
        $headers = array(
            "Content-Type" => $contentType,
            "Accept" => "application/json"
        );
        switch ($authType) {
            case "apiKey":
                $headers["X-Api-Key"] = $this->apiKey;
                break;
            case "sessionToken":
                $headers["X-Session-Token"] = $this->sessionToken;
                break;
            case "basic":
                $auth = base64_encode(
                    $this->credentials[0] . ":" . $this->credentials[1]
                );
                $headers["Authorization"] = "Basic $auth";
                break;
            default:
                throw new \InvalidArgumentException(
                    "Invalid auth type: $authType"
                );
        }
        list($code, $headers, $body) = $this->execute(
            $uri,
            $method,
            $headers,
            $body
        );
        $result = new Result($code, $headers, json_decode($body, true));
        switch ($code) {
            case 401:
                /*
                 * It could happen that the session token expires, so try
                 * to login again and then reissue the request if the login was
                 * successful.
                 */
                if ($authType === "sessionToken") {
                    $this->login();
                    return $this->run($endpoint, $method, $contentType, $body);
                } else {
                    throw new InvalidCredentials;
                }
                break;
            case 402:
                throw new PaymentRequired;
            case 402:
                throw new Forbidden;
            case 404:
                throw new NotFound;
            case 405:
                throw new InvalidMethod;
            case 415:
                throw new InvalidMedia;
            case 429:
                throw new RateLimited($result);
            case 500:
                throw new ServerError;
            case 400:
                throw new ClientError($result);
            default:
                break;
        }
        return $result;
    }

    /**
     * Executes the request. Will depend on the client implementation.
     * Returns an array with code, headers, and body.
     *
     * @param string $uri The URI to request.
     * @param string $method The HTTP method to use.
     * @param array $headers The HTTP headers.
     * @param string $body Payload to send.
     *
     * @return array
     * @throws PortaText\Exception\RequestError
     */
    public abstract function execute($uri, $method, $headers, $body);

    /**
     * Logs in and stores session token on success.
     *
     * @return void
     * @throws PortaText\Exception\RequestError
     * @throws PortaText\Exception\ServerError
     * @throws PortaText\Exception\ClientError
     * @throws PortaText\Exception\InvalidCredentials
     * @throws PortaText\Exception\PaymentRequired
     * @throws PortaText\Exception\Forbidden
     * @throws PortaText\Exception\NotFound
     * @throws PortaText\Exception\InvalidMedia
     * @throws PortaText\Exception\InvalidMethod
     * @throws PortaText\Exception\RateLimited
     * @throws InvalidArgumentException
     */
    protected function login()
    {
        $result = $this->run("login", "post", "application/json", "", "basic");
        $this->sessionToken = $result->data["token"];
    }

    /**
     * Sets the API Key to use.
     *
     * @param string $apiKey Your PortaText API Key.
     *
     * @return PortaText\Client\IClient
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * Sets a username and password for basic and webbasic auth.
     *
     * @param string $username The username.
     * @param string $password The password.
     *
     * @return PortaText\Client\IClient
     */
    public function setCredentials($username, $password)
    {
        $this->credentials = array($username, $password);
        return $this;
    }

    /**
     * Sets the endpoint to use.
     *
     * @param string $endpoint You can optionally specify a different endpoint.
     *
     * @return PortaText\Client\IClient
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->logger = new NullLogger;
        $this->commandFactory = new Factory;
        $this->endpoint = self::$DEFAULT_ENDPOINT;
    }
}
