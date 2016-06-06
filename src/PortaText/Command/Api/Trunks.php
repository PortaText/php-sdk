<?php
/**
 * The Trunks endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_trunks Trunks endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Trunks endpoint.
 */
class Trunks extends Base
{
    /**
     * Sets the trunk name.
     *
     * @param string $name Trunk name.
     *
     * @return PortaText\Command\ICommand
     */
    public function name($name)
    {
        return $this->setArgument("name", $name);
    }

    /**
     * Sets the trunk ip address.
     *
     * @param string $ip trunk ip address
     *
     * @SuppressWarnings("ShortMethodName")
     * @return PortaText\Command\ICommand
     */
    public function ip($ipAddress)
    {
        return $this->setArgument("ip", $ipAddress);
    }

    /**
     * Sets the trunk id.
     *
     * @param integer $trunkId Trunk id.
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
     */
    public function id($trunkId)
    {
        return $this->setArgument("id", $trunkId);
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
        $endpoint = "trunks";
        $trunkId = $this->getArgument("id");
        if (!is_null($trunkId)) {
            $endpoint .= "/$trunkId";
            $this->delArgument("id");
        }
        return $endpoint;
    }
}
