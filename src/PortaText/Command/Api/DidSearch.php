<?php
/**
 * The dids/search endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_dids_search DidsSearch endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The dids/search endpoint.
 */
class DidSearch extends Base
{
    /**
     * Set Name.
     *
     * @param string $isoCode The 2 letter country ISO code.
     *
     * @return PortaText\Command\ICommand
     */
    public function forCountry($isoCode)
    {
        return $this->setArgument('country', $isoCode);
    }

    /**
     * Search only for toll free numbers.
     *
     * @return PortaText\Command\ICommand
     */
    public function tollFree()
    {
        return $this->setArgument("type", "toll_free");
    }

    /**
     * Search only for local numbers.
     *
     * @return PortaText\Command\ICommand
     */
    public function local()
    {
        return $this->setArgument("type", "local");
    }

    /**
     * Search only for national numbers.
     *
     * @return PortaText\Command\ICommand
     */
    public function national()
    {
        return $this->setArgument("type", "national");
    }

    /**
     * Search only for mobile numbers.
     *
     * @return PortaText\Command\ICommand
     */
    public function mobile()
    {
        return $this->setArgument("type", "mobile");
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
     * Searches numbers that start with the specific pattern.
     *
     * @param string $pattern The pattern.
     *
     * @return PortaText\Command\ICommand
     */
    public function startsWith($pattern)
    {
        $this->setArgument('where_pattern', 'starts_with');
        return $this->setArgument('pattern', $pattern);
    }

    /**
     * Searches numbers that ends with the specific pattern.
     *
     * @param string $pattern The pattern.
     *
     * @return PortaText\Command\ICommand
     */
    public function endsWith($pattern)
    {
        $this->setArgument('where_pattern', 'ends_with');
        return $this->setArgument('pattern', $pattern);
    }

    /**
     * Searches numbers that contains the specific pattern.
     *
     * @param string $pattern The pattern.
     *
     * @return PortaText\Command\ICommand
     */
    public function contains($pattern)
    {
        $this->setArgument('where_pattern', 'anywhere');
        return $this->setArgument('pattern', $pattern);
    }

    /**
     * Returns the body for this endpoint.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function getBody($method)
    {
        return "";
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
        $queryString = http_build_query($this->getArguments($method));
        return "dids/search?$queryString";
    }
}
