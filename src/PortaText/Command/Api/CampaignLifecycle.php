<?php
/**
 * The Campaigns Lifecycle endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_campaigns_lifecycle Campaigns lifecycle endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Campaigns Lifecycle endpoint.
 */
class CampaignLifecycle extends Base
{
    /**
     * Sets the campaign id.
     *
     * @param integer $campaignId Campaign id.
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
     */
    public function id($campaignId)
    {
        return $this->setArgument("id", $campaignId);
    }

    /**
     * Starts a campaign.
     *
     * @return PortaText\Command\ICommand
     */
    public function start()
    {
        return $this->setArgument("action", "start");
    }

    /**
     * Resumes a campaign.
     *
     * @return PortaText\Command\ICommand
     */
    public function resume()
    {
        return $this->setArgument("action", "resume");
    }

    /**
     * Starts a campaign.
     *
     * @return PortaText\Command\ICommand
     */
    public function pause()
    {
        return $this->setArgument("action", "pause");

    }

    /**
     * Cancels a campaign.
     *
     * @return PortaText\Command\ICommand
     */
    public function cancel()
    {
        return $this->setArgument("action", "cancel");
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
        $campaignId = $this->getArgument("id");
        if (is_null($campaignId)) {
            throw new \InvalidArgumentException("Campaign id cant be null");
        }
        $this->delArgument("id");
        return "campaigns/$campaignId/lifecycle";
    }
}
