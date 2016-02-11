<?php
/**
 * The Contacts endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_all_contacts Contacts endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Contacts endpoint.
 */
class Contacts extends Base
{
    /**
     * Use this contact number.
     *
     * @param string $number number.
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
     */
    public function id($number)
    {
        return $this->setArgument("number", $number);
    }

    /**
     * Include contact lists in export.
     *
     * @return PortaText\Command\ICommand
     */
    public function withContactLists()
    {
        return $this->setArgument("with_contact_lists", true);
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
     * Specify only a variable name.
     *
     * @param string $name name.
     *
     * @return PortaText\Command\ICommand
     */
    public function name($name)
    {
        return $this->setArgument("name", $name);
    }

    /**
     * Sets the given variable.
     *
     * @param string $name name.
     * @param string $value value.
     *
     * @return PortaText\Command\ICommand
     */
    public function set($name, $value)
    {
        $this->name($name);
        return $this->setArgument("value", $value);
    }

    /**
     * Sets all the given variables.
     *
     * @param array $variables variables.
     *
     * @return PortaText\Command\ICommand
     */
    public function setAll($variables)
    {
        $vars = array();
        foreach ($variables as $k => $v) {
            $vars[] = array('key' => $k, 'value' => $v);
        }
        return $this->setArgument("variables", $vars);
    }

    /**
     * Send a CSV file to import variables.
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
     * Used to export the variables to a CSV file on a GET.
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
        $number = $this->getArgument("number");
        $this->delArgument("number");
        $endpoint = "contacts";
        if (!is_null($number)) {
            $endpoint .= "/$number/variables";
        }
        $name = $this->getArgument("name");
        if (!is_null($name)) {
            $endpoint .= "/$name";
            $this->delArgument("name");
        }
        $queryString = array();
        $withContactLists = $this->getArgument("with_contact_lists");
        if (!is_null($withContactLists)) {
            $queryString['with_contact_lists'] = "true";
            $this->delArgument("with_contact_lists");
        }
        $page = $this->getArgument("page");
        if (!is_null($page)) {
            $queryString['page'] = $page;
            $this->delArgument("page");
        }
        if (!empty($queryString)) {
            $queryString = http_build_query($queryString);
            return "$endpoint?$queryString";
        }
        return $endpoint;
    }
}
