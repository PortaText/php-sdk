<?php
/**
 * Thrown when a request fails because of client behavior.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Exception;

/**
 * Thrown when a request fails because of client behavior.
 */
class ClientError extends RequestError
{
    /**
     * The request result.
     *
     * @var PortaText\Command\Result
     */
    protected $result;

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
     * Constructor.
     *
     * @param PortaText\Command\Result $result Request result.
     *
     */
    public function __construct($result)
    {
        $this->result = $result;
    }
}
