<?php
/**
 * Thrown on 406 error.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Exception;

/**
 * Thrown on 406 error.
 */
class NotAcceptable extends RequestError
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "Invalid accepte content type sent for this endpoint/method"
        );
    }
}
