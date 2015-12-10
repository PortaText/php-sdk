<?php
/**
 * Thrown on 403 error.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Exception;

/**
 * Thrown on 403 error.
 */
class Forbidden extends RequestError
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct("Access to the asked resource was denied");
    }
}
