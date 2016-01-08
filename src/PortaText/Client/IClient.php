<?php
/**
 * Client interface.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Client;

use Psr\Log\LoggerInterface;

/**
 * Client interface.
 */
interface IClient
{
    /**
     * Sets the logger implementation.
     *
     * @param Psr\Log\LoggerInterface $logger The PSR3-Logger
     *
     * @return PortaText\Client\IClient
     */
    public function setLogger(LoggerInterface $logger);

    /**
     * Sets the API Key to use.
     *
     * @param string $apiKey Your PortaText API Key.
     *
     * @return PortaText\Client\IClient
     */
    public function setApiKey($apiKey);

    /**
     * Sets a username and password for basic and webbasic auth.
     *
     * @param string $username The username.
     * @param string $password The password.
     *
     * @return PortaText\Client\IClient
     */
    public function setCredentials($username, $password);

    /**
     * Sets the endpoint to use.
     *
     * @param string $endpoint You can optionally specify a different endpoint.
     *
     * @return PortaText\Client\IClient
     */
    public function setEndpoint($endpoint);

    /**
     * Runs the given command.
     *
     * @param string $endpoint Endpoint to invoke.
     * @param string $method HTTP method to use.
     * @param string $contentType Content-Type value.
     * @param string $acceptContentType Accept value.
     * @param string $body Payload to send.
     * @param string $outputFile File where to write result to.
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
     * @throws PortaText\Exception\NotAcceptable
     * @throws PortaText\Exception\InvalidMethod
     * @throws PortaText\Exception\RateLimited
     * @throws InvalidArgumentException
     */
    public function run(
        $endpoint,
        $method,
        $contentType,
        $acceptContentType,
        $body,
        $outputFile = null,
        $authType = null
    );
}
