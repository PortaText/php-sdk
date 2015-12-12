<?php
/**
 * The Templates endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_templates Templates endpoint.
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
     * Sets the template name.
     *
     * @param string $name name name.
     *
     * @return PortaText\Command\ICommand
     */
    public function name($name)
    {
        return $this->setArgument("name", $name);
    }

    /**
     * Sets the template description.
     *
     * @param string $description Template description.
     *
     * @return PortaText\Command\ICommand
     */
    public function description($description)
    {
        return $this->setArgument("description", $description);
    }

    /**
     * Sets the template text.
     *
     * @param string $text Template text.
     *
     * @return PortaText\Command\ICommand
     */
    public function text($text)
    {
        return $this->setArgument("text", $text);
    }

    /**
     * Sets the template id.
     *
     * @param integer $templateId Template id.
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
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
    protected function endpoint($method)
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
