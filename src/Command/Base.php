<?php
/**
 * The super class of every API command.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command;

/**
 * The super class of every API command.
 */
class Base implements ICommand
{
    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     * @param string $args The endpoint for this command.
     *
     * @return string
     * @throws PortaText\Exception\NotImplemented
     */
    public function endpoint($method, array $args = array())
    {
        throw new NotImplemented;
    }
}
