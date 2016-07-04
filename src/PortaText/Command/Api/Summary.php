<?php
/**
 * The Summary endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_summary Summary endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Summary endpoint.
 */
class Summary extends Base
{
    /**
     * Sets the end date.
     *
     * @param string $date End date (see the API doc).
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
     */
    public function to($date)
    {
        return $this->setArgument("date_to", $date);
    }

    /**
     * Sets the start date.
     *
     * @param string $date Start date (see the API doc).
     *
     * @return PortaText\Command\ICommand
     */
    public function from($date)
    {
        return $this->setArgument("date_from", $date);
    }

    /**
     * Used to export the summary to a CSV file on a GET.
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
        $endpoint = "summary";
        $queryString = array();
        $dateFrom = $this->getArgument("date_from");
        if (!is_null($dateFrom)) {
            $queryString['date_from'] = $dateFrom;
            $this->delArgument("date_from");
        }
        $dateTo = $this->getArgument("date_to");
        if (!is_null($dateTo)) {
            $queryString['date_to'] = $dateTo;
            $this->delArgument("date_to");
        }
        if (!empty($queryString)) {
            $queryString = http_build_query($queryString);
            $endpoint .= "?$queryString";
        }
        return $endpoint;
    }
}
