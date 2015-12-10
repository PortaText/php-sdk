<?php
/**
 * The Templates endpoint.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Templates endpoint.
 */
class Templates extends Base
{
    /**
     * Sets the template id.
     *
     * @param integer $template Template id.
     *
     * @return PortaText\Command\ICommand
     */
    public function id($templateId)
    {
        return $this->setArgument("id", $templateId);
    }

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
            $this->delArgument("id");
        }
        return $endpoint;
    }
}
