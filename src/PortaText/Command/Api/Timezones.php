<?php
/**
 * The Timezone endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_timezones Timezones endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Timezone endpoint.
 */
class Timezones extends Base
{
    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function endpoint($method)
    {
        return "timezones";
    }
}
