<?php
/**
 * The Tariffs endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_tariffs Tariffs endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Tariffs endpoint.
 */
class Tariffs extends Base
{
    /**
     * Sets the tariff country ISO code.
     *
     * @param string $countryIso The tariff country ISO code.
     *
     * @return PortaText\Command\ICommand
     */
    public function forCountry($countryIso)
    {
        return $this->setArgument("id", $countryIso);
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
        $endpoint = "tariffs";
        $countryIso = $this->getArgument("id");
        if (!is_null($countryIso)) {
            $endpoint .= "/$countryIso";
            $this->delArgument("id");
        }
        return $endpoint;
    }
}
