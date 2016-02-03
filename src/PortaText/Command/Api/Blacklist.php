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
        $endpoint = 'blacklist';
        $number = $this->getArgument("number");
        if (!is_null($number)) {
            $endpoint .= "/$number";
            $this->delArgument("number");
        }
        if (!is_null($this->getArgument('file'))
            || !is_null($this->getArgument('accept_file'))
        ) {
            $endpoint .= '/contacts';
        }
        $page = $this->getArgument("page");
        $this->delArgument("page");
        if (!is_null($page)) {
            $endpoint .= "?page=$page";
        }
        return $endpoint;
    }
}
