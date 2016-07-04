<?php
/**
 * The GsmCharset endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_gsm_charset GsmCharset endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The GsmCharset endpoint.
 */
class GsmCharset extends Base
{
    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function getEndpoint($method)
    {
        $endpoint = "gsm_charset";
        return $endpoint;
    }
}
