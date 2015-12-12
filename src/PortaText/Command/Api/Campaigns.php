<?php
/**
 * The Campaigns endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_campaigns Campaigns endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Campaigns endpoint.
 */
class Campaigns extends Base
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
     * The campaign name.
     *
     * @param string $name Name.
     *
     * @return PortaText\Command\ICommand
     */
    public function name($name)
    {
        return $this->setArgument("name", $name);
    }

    /**
     * The campaign description.
     *
     * @param string $description Description.
     *
     * @return PortaText\Command\ICommand
     */
    public function description($description)
    {
        return $this->setArgument("description", $description);
    }

    /**
     * Specifies source telephone number for the campaign.
     *
     * @param string $from Telephone number (you must own this one).
     *
     * @return PortaText\Command\ICommand
     */
    public function from($from)
    {
        return $this->setArgument("from", $from);
    }

    /**
     * Contact list IDs to use.
     *
     * @param array $contactLists The contact list ids.
     *
     * @return PortaText\Command\ICommand
     */
    public function toContactLists(array $contactLists)
    {
        return $this->setArgument("contact_list_ids", $contactLists);
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
        $endpoint = "campaigns";
        $campaignId = $this->getArgument("id");
        if (!is_null($campaignId)) {
            $endpoint .= "/$campaignId";
            $this->delArgument("id");
            $this->delArgument("type");
        }
        return $endpoint;
    }
}
