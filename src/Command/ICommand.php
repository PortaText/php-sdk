<?php
/**
 * An API command interface.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command;

/**
 * An API command interface.
 */
interface ICommand
{
    /**
     * Executes this command.
     *
     * @param array $args Associative array with the arguments.
     *
     * @return PortaText\Command\Result
     * @throws PortaText\Exception\NotImplemented
     */
    public function get(array $args = array());

    /**
     * Executes this command.
     *
     * @param array $args Associative array with the arguments.
     *
     * @return PortaText\Command\Result
     * @throws PortaText\Exception\NotImplemented
     */
    public function post(array $args = array());

    /**
     * Executes this command.
     *
     * @param array $args Associative array with the arguments.
     *
     * @return PortaText\Command\Result
     * @throws PortaText\Exception\NotImplemented
     */
    public function delete(array $args = array());

    /**
     * Executes this command.
     *
     * @param array $args Associative array with the arguments.
     *
     * @return PortaText\Command\Result
     * @throws PortaText\Exception\NotImplemented
     */
    public function put(array $args = array());

    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     * @param string $args The endpoint for this command.
     *
     * @return string
     * @throws PortaText\Exception\NotImplemented
     */
    public function endpoint($method, array $args = array());
}
