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
     * @return PortaText\Command\Result;
     */
    public function run(array $args);
}
