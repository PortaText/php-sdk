<?php
/**
 * The Number Verify endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_number_verify Number Verify endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Number Verify endpoint.
 */
class NumberVerify extends Base
{
    /**
     * Selects the target number.
     *
     * @param string $number The number where to send the verification code to.
     *
     * @return PortaText\Command\ICommand
     */
    public function forNumber($number)
    {
        return $this->setArgument("number", $number);
    }

    /**
     * Sets the code number when verifying the number.
     *
     * @param string $target Phone number to send message to.
     *
     * @return PortaText\Command\ICommand
     */
    public function verifyWith($code)
    {
        return $this->setArgument("code", $code);
    }

    /**
     * Sets the message source number.
     *
     * @param string $number Phone number to send message from.
     *
     * @return PortaText\Command\ICommand
     */
    public function from($number)
    {
        return $this->setArgument("from", $number);
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
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function getEndpoint($method)
    {
        $number = $this->getArgument("number");
        $this->delArgument("number");
        $endpoint = "number_verify/$number";

        $code = $this->getArgument("code");
        $this->delArgument("code");
        if (!is_null($code)) {
            $endpoint .= "?code=$code";
        }
        return $endpoint;
    }
}
