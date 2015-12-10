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
     * Constructor.
     */
    public function __construct($descriptor = null, $result = null)
    {
        parent::__construct(
            "There was an error with how the request was sent",
            $descriptor,
            $result
        );
    }
}
