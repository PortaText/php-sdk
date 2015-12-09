<?php
/**
 * The Template endpoint.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command;

use PortaText\Exception\NotImplemented;

/**
 * The Template endpoint.
 */
class Template extends Base
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
        $endpoint = "templates";
        if (isset($args["id"])) {
            $endpoint .= "/{$args['id']}";
        }
        return $endpoint;
    }
}
