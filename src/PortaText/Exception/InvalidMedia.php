<?php
/**
 * Thrown on 415 error.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Exception;

/**
 * Thrown on 415 error.
 */
class InvalidMedia extends RequestError
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "Invalid content type sent for this endpoint/method"
        );
    }
}
