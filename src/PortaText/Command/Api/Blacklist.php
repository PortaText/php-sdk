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
     * Returns the body for this endpoint.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function body($method)
    {
        $file = $this->getArgument("file");
        if (!is_null($file)) {
            return "file:$file";
        }
        return parent::body($method);
    }

    /**
     * Returns the content type for this endpoint.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function contentType($method)
    {
        $file = $this->getArgument("file");
        if (!is_null($file)) {
            return "text/csv";
        }
        return parent::contentType($method);
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
        $endpoint = "blacklist/contacts";
        $number = $this->getArgument("number");
        if (!is_null($number)) {
            $endpoint = "blacklist/$number";
            $this->delArgument("number");
        }
        return $endpoint;
    }
}
