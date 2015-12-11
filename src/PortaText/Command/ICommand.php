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

/**
 * An API command interface.
 */
interface ICommand
{
    /**
     * Runs this command with a GET method and returns the result.
     *
     * @return PortaText\Command\ICommand
     * @throws PortaText\Exception\RequestError
     */
    public function get();

    /**
     * Runs this command with a POST method and returns the result.
     *
     * @return PortaText\Command\ICommand
     * @throws PortaText\Exception\RequestError
     */
    public function post();

    /**
     * Runs this command with a PUT method and returns the result.
     *
     * @return PortaText\Command\ICommand
     * @throws PortaText\Exception\RequestError
     */
    public function put();

    /**
     * Runs this command with a DELETE method and returns the result.
     *
     * @return PortaText\Command\ICommand
     * @throws PortaText\Exception\RequestError
     */
    public function delete();

    /**
     * Runs this command with a PATCH method and returns the result.
     *
     * @return PortaText\Command\ICommand
     * @throws PortaText\Exception\RequestError
     */
    public function patch();

    /**
     * Sets the API client to use.
     *
     * @param PortaText\Client\Client $client New injected client.
     *
     * @return PortaText\Api\Api
     */
    public function setClient(IClient $client);
}
