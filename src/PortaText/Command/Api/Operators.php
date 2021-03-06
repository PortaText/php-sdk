<?php
/**
 * The Operators endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_operators Operators endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Operators endpoint.
 */
class Operators extends Base
{
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
     * Sort by the given field and order elements.
     *
     * @param string $sortBy 'country' or 'mcc'.
     * @param string $order 'asc' or 'desc'.
     *
     * @return PortaText\Command\ICommand
     */
    public function sortBy($sortBy, $order)
    {
        $this->setArgument("sortBy", $sortBy);
        return $this->setArgument("order", $order);
    }

    /**
     * Used to export the list to a CSV file on a GET.
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
        $endpoint = "operators";
        $queryString = array();
        $page = $this->getArgument("page");
        $sortBy = $this->getArgument("sortBy");
        $order = $this->getArgument("order");
        if (!is_null($page)) {
            $queryString['page'] = $page;
            $this->delArgument("page");
        }
        if (!is_null($sortBy)) {
            $queryString['sort_by'] = $sortBy;
            $this->delArgument("sortBy");
        }
        if (!is_null($order)) {
            $queryString['order'] = $order;
            $this->delArgument("order");
        }
        if (!empty($queryString)) {
            $queryString = http_build_query($queryString);
            $endpoint .= "?$queryString";
        }
        return $endpoint;
    }
}
