<?php
/**
 * Thrown when the authentication credentials are rejected.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Exception;

/**
 * Thrown when the authentication credentials are rejected.
 */
class InvalidCredentials extends RequestError
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct("Your authentication credentials were rejected");
    }
}
