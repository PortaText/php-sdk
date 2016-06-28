<?php
/**
 * The Inspect endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_inspect Inspect endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Inspect endpoint.
 */
class Inspect extends Base
{
    /**
     * Inspects the given number.
     *
     * @param string $number The number to inspect.
     *
     * @return PortaText\Command\ICommand
     */
    public function number($number)
    {
        return $this->setArgument("number", $number);
    }

    /**
     * Send a CSV file to inspect numbers.
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
    protected function getEndpoint($method)
    {
        $endpoint = 'inspect';
        $number = $this->getArgument("number");
        if (!is_null($number)) {
            $endpoint .= "/$number";
            $this->delArgument("number");
        }
        return $endpoint;
    }
}
