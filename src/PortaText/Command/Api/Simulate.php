<?php
/**
 * The Simulate endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_simulate Simulate endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Simulate endpoint.
 */
class Simulate extends Base
{
    /**
     * Sets the destination country.
     *
     * @param string $country 2-letter country ISO code.
     *
     * @return PortaText\Command\ICommand
     */
    public function country($country)
    {
        return $this->setArgument("country", $country);
    }

    /**
     * Sets the template id to use.
     *
     * @param integer $templateId Use the given template as the message body.
     * @param array $variables Variables to use in template.
     *
     * @return PortaText\Command\ICommand
     */
    public function useTemplate($templateId, array $variables = array())
    {
        $this->setArgument("template_id", $templateId);
        return $this->setArgument("variables", $variables);
    }

    /**
     * Sets the message text.
     *
     * @param string $text Message text.
     *
     * @return PortaText\Command\ICommand
     */
    public function text($text)
    {
        return $this->setArgument("text", $text);
    }

    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function getEndpoint($method)
    {
        $endpoint = "simulate";
        return $endpoint;
    }
}
