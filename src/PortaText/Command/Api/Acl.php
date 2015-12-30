<?php
/**
 * The Me/Acl endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_acl ACL endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Me/Acl endpoint.
 */
class Acl extends Base
{
    /**
     * Adds an ip to the ACL.
     *
     * @param string $ipAddress IP Address.
     * @param integer $netmask Netmask.
     * @param string $description Address description.
     *
     * @return PortaText\Command\ICommand
     */
    public function add($ipAddress, $netmask = 32, $description = '')
    {
        return $this->setArgument("$ipAddress$netmask", array(
            "ip" => $ipAddress,
            "netmask" => $netmask,
            "description" => $description
        ));
    }

    /**
     * Returns the body for this endpoint.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function getBody($method)
    {
        if ($method === "get") {
            return parent::getBody($method);
        }
        $acls = array();
        foreach ($this->getArguments() as $value) {
            $acls[] = $value;
        }
        return json_encode(array("acl" => $acls));
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
        return "me/acl";
    }
}
