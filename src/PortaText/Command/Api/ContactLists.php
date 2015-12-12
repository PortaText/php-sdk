<?php
/**
 * The ContactLists endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_contact_lists ContactLists endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The ContactLists endpoint.
 */
class ContactLists extends Base
{
    /**
     * Sets the contact list id.
     *
     * @param integer $contactListId Contact list id.
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
     */
    public function id($contactListId)
    {
        return $this->setArgument("id", $contactListId);
    }

    /**
     * The contact list name.
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
     * The contact list description.
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
     * Send a CSV file to blacklist contacts.
     *
     * @param string $filename Full absolute path to the csv file.
     *
     * @return PortaText\Command\ICommand
     */
    public function csv($filename)
    {
        return $this->setArgument("file", $filename);
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
        $endpoint = "contact_lists";
        $contactListId = $this->getArgument("id");
        if (!is_null($contactListId)) {
            $endpoint = "contact_lists/$contactListId";
            $this->delArgument("id");
        }
        $file = $this->getArgument("file");
        if (!is_null($file)) {
            $endpoint .= "/contacts";
        }
        return $endpoint;
    }
}
