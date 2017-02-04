<?php
/**
 * The Calls endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_calls Calls endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Calls endpoint.
 */
class Calls extends Base
{
    /**
     * Sets the message destination number.
     *
     * @param string $target Phone number to send message to.
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
     */
    public function to($target)
    {
        return $this->setArgument("to", $target);
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
     * Sets the outbound trunk id.
     *
     * @param integer $trunkId Trunk ID.
     *
     * @return PortaText\Command\ICommand
     */
    public function outboundTrunk($trunkId)
    {
        return $this->setArgument("outbound_trunk_id", $trunkId);
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
        return $this->setArgument("dial_timeout", $dialTimeout);
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
        return $this->setArgument("flow", $flow);
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
        $endpoint = "calls";
        return $endpoint;
    }
}
