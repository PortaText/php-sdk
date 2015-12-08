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

/**
 * All API client implementations should extend this class.
 */
abstract class Base
{

    /**
     * Holds the logger implementation.
     *
     * @var Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Holds the command factory implementation.
     *
     * @var PortaText\Command\IFactory
     */
    protected $commandFactory;

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
        $this->logger->debug("Asked for command $name");
        return $this->commandFactory->get($name);
    }

    /**
     * Sets the logger implementation.
     *
     * @param Psr\Log\LoggerInterface $logger The PSR3-Logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->logger = new NullLogger;
        $this->commandFactory = new Factory;
    }
}
