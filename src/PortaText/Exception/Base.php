<?php
/**
 * Base class for all PortaText Exceptions.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Exception;

/**
 * Base class for all PortaText Exceptions.
 */
class Base extends \Exception
{
    /**
     * Constructor.
     *
     * @param string $message Error message.
     *
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
