<?php
/**
 * An API command interface.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command;

use PortaText\Client\IClient;
use Psr\Log\LoggerInterface;

/**
 * An API command interface.
 */
interface ICommand
{
    /**
     * Returns an associative array with the arguments.
     *
     * @param string $method Method for this command.
     *
     * @return array
     */
    public function arguments($method);

    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     * @param string $args The endpoint for this command.
     *
     * @return string
     */
    public function endpoint($method);

    /**
     * Returns the content type for this endpoint.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    public function contentType($method);

    /**
     * Returns the body for this endpoint.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    public function body($method);

    /**
     * Runs this command with the given method and returns the result.
     *
     * @return PortaText\Command\ICommand
     * @throws PortaText\Exception\RequestError
     */
    public function get();

    /**
     * Runs this command with the given method and returns the result.
     *
     * @return PortaText\Command\ICommand
     * @throws PortaText\Exception\RequestError
     */
    public function post();

    /**
     * Runs this command with the given method and returns the result.
     *
     * @return PortaText\Command\ICommand
     * @throws PortaText\Exception\RequestError
     */
    public function put();

    /**
     * Runs this command with the given method and returns the result.
     *
     * @return PortaText\Command\ICommand
     * @throws PortaText\Exception\RequestError
     */
    public function delete();

    /**
     * Sets the API client to use.
     *
     * @param PortaText\Client\Client $client New injected client.
     *
     * @return PortaText\Api\Api
     */
    public function setClient(IClient $client);
}
