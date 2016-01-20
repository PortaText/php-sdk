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
     * Sets the template id to use.
     *
     * @param integer $templateId Use the given template as the message body.
     * @param array $variables Variables to use in template.
     *
     * @return PortaText\Command\ICommand
     */
    public function useTemplate($templateId, array $variables = array())
    {
        return $this->setArgument("settings", array(
            "template_id" => $templateId,
            "variables" => $variables
        ));
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
        return $this->setArgument("settings", array(
            "text" => $text
        ));
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
