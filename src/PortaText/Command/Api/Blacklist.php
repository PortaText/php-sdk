<?php
/**
 * The Blacklist endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#blacklistnumber Blacklist endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Blacklist endpoint.
 */
class Blacklist extends Base
{
    /**
     * Blacklists the given number.
     *
     * @param string $number The number to blacklist.
     *
     * @return PortaText\Command\ICommand
     */
    public function number($number)
    {
        return $this->setArgument("number", $number);
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
     * Used to export the blacklist to a CSV file on a GET.
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
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function getEndpoint($method)
    {
        $endpoint = "blacklist/contacts";
        $number = $this->getArgument("number");
        if (!is_null($number)) {
            $endpoint = "blacklist/$number";
            $this->delArgument("number");
        }
        return $endpoint;
    }
}
