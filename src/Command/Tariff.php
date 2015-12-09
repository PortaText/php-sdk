<?php
/**
 * The Tariff endpoint.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command;

use PortaText\Exception\NotImplemented;

/**
 * The Tariff endpoint.
 */
class Tariff extends Base
{
    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     * @param string $args The endpoint for this command.
     *
     * @return string
     */
    public function endpoint($method, array $args = array())
    {
        $endpoint = "tariffs";
        if (isset($args["id"])) {
            $endpoint .= "/{$args['id']}";
        }
        return $endpoint;
    }
}
