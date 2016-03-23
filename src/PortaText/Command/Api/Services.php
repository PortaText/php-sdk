<?php
/**
 * The SMS Services endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_sms_services SMS Services endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The SMS Services endpoint.
 */
class Services extends Base
{
    /**
     * Sets the service ID.
     *
     * @param integer $serviceId The service id.
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
     */
    public function id($serviceId)
    {
        return $this->setArgument("id", $serviceId);
    }

    /**
     * Used to export the contact list to a CSV file on a GET.
     *
     * @param string $filename The filename.
     *
     * @return PortaText\Command\ICommand
     */
    public function saveTo($filename)
    {
        return $this->setArgument("accept_file", $filename);
    }

    /**
     * Return the specific page of results.
     *
     * @param integer $page Page number.
     *
     * @return PortaText\Command\ICommand
     */
    public function page($page)
    {
        return $this->setArgument("page", $page);
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
        $endpoint = "sms_services";
        $serviceId = $this->getArgument("id");
        if (!is_null($serviceId)) {
            $endpoint .= "/$serviceId";
            $this->delArgument("id");
        }
        $saveTo = $this->getArgument("accept_file");
        if (!is_null($saveTo)) {
            $endpoint .= "/subscribers";
        }
        $page = $this->getArgument("page");
        $this->delArgument("page");
        if (!is_null($page)) {
            $endpoint .= "/subscribers?page=$page";
        }
        return $endpoint;
    }
}
