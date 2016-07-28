<?php
/**
 * The Campaigns endpoint. This is a campaign of type SMS.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_campaigns Campaigns endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Campaigns endpoint. This is a campaign of type SMS.
 */
class SmsCampaign extends Campaigns
{
    /**
     * Specifies source sms service.
     *
     * @param string $serviceId SMS Service ID.
     *
     * @return PortaText\Command\ICommand
     */
    public function fromService($serviceId)
    {
        return $this->setArgument("service_id", $serviceId);
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
        $this->setSetting("template_id", $templateId);
        return $this->setSetting("variables", $variables);
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
        return $this->setSetting("text", $text);
    }
    /**
     * Standard constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->setArgument("type", "sms");
    }
}
