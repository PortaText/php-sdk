<?php
/**
 * The interface of a command factory.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command;

/**
 * The interface of a command factory.
 */
interface IFactory
{
    /**
     * Returns a command instance based on the command name requested.
     *
     * @param string $command The name of the command.
     *
     * @return PortaText\Command\ICommand
     * @throws InvalidArgumentException
     */
    public function get($command);
}
