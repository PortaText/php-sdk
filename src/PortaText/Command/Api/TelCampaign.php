<?php
/**
 * The Campaigns endpoint. This is a campaign of type Telephony.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_campaigns Campaigns endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Campaigns endpoint. This is a campaign of type Telephony.
 */
class TelCampaign extends Campaigns
{
    /**
     * Sets the total number of iterations.
     *
     * @param integer $iterations Maximum number of attempts to contact.
     *
     * @return PortaText\Command\ICommand
     */
    public function iterations($iterations)
    {
        return $this->setSetting("iterations", $iterations);
    }

    /**
     * Sets the total number of agents.
     *
     * @param integer $agents Maximum number of attempts to contact.
     *
     * @return PortaText\Command\ICommand
     */
    public function agents($agents)
    {
        return $this->setSetting("agents", $agents);
    }

    /**
     * Sets the post work duration for each agent after each call.
     *
     * @param integer $seconds Post call work duration.
     *
     * @return PortaText\Command\ICommand
     */
    public function postCallWorkDuration($seconds)
    {
        return $this->setSetting("post_call_work_duration", $seconds);
    }

    /**
     * Minimum time to wait before attempting to recontact a target.
     *
     * @param integer $minutes Time in minutes.
     *
     * @return PortaText\Command\ICommand
     */
    public function minIterationTime($minutes)
    {
        return $this->setSetting("min_iteration_time", $minutes);
    }

    /**
     * Sets the outbound trunk id.
     *
     * @param integer $trunkId Trunk ID.
     *
     * @return PortaText\Command\ICommand
     */
    public function outboundTrunk($trunkId)
    {
        return $this->setSetting("outbound_trunk_id", $trunkId);
    }

    /**
     * Dial Timeout for Leg A.
     *
     * @param integer $dialTimeout In seconds.
     *
     * @return PortaText\Command\ICommand
     */
    public function dialTimeout($dialTimeout)
    {
        return $this->setSetting("dial_timeout", $dialTimeout);
    }

    /**
     * An array of call flow objects.
     *
     * @param array $flow Call flow objects.
     *
     * @return PortaText\Command\ICommand
     */
    public function flow($flow)
    {
        return $this->setSetting("flow", $flow);
    }

    /**
     * Standard constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->setArgument("type", "telephony");
    }
}
