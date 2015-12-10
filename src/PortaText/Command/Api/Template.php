<?php
/**
 * The Template endpoint.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Exception\NotImplemented;
use PortaText\Command\Base;

/**
 * The Template endpoint.
 */
class Template extends Base
{
    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    public function endpoint($method)
    {
        $endpoint = "templates";
        $templateId = $this->getArgument("id");
        if (!is_null($templateId)) {
            $endpoint .= "/$templateId";
        }
        return $endpoint;
    }
}
