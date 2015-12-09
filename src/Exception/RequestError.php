<?php
/**
 * Thrown on HTTP request error.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Exception;

/**
 * Thrown on HTTP request error.
 */
class RequestError extends Base
{
    /**
     * The request result.
     *
     * @var PortaText\Command\Result
     */
    protected $result;

    /**
     * The request descriptor.
     *
     * @var PortaText\Command\Descriptor
     */
    protected $descriptor;

    /**
     * Returns the request result.
     *
     * @return PortaText\Command\Result
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Returns the request descriptor.
     *
     * @return PortaText\Command\Descriptor
     */
    public function getDescriptor()
    {
        return $this->descriptor;
    }

    /**
     * Constructor.
     *
     * @param PortaText\Command\Descriptor $descriptor The Command descriptor.
     * @param PortaText\Command\Result $result Request result.
     *
     */
    public function __construct($commandDescriptor = null, $result = null)
    {
        $this->result = $result;
        $this->descriptor = $commandDescriptor;
    }
}
