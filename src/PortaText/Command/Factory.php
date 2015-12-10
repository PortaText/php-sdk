<?php
/**
 * A command factory implementation.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command;

/**
 * A command factory implementation.
 */
class Factory implements IFactory
{
    /**
     * Returns a command instance based on the command name requested.
     *
     * @param string $command The name of the command.
     *
     * @return PortaText\Command\ICommand
     * @throws InvalidArgumentException
     */
    public function get($command)
    {
        $className = ucfirst($command);
        $className = "PortaText\\Command\\Api\\$className";
        if (!class_exists($className)) {
            throw new \InvalidArgumentException(
                "Command $command does not exist"
            );
        }
        return new $className();
    }
}
