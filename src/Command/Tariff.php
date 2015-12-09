<?php
/**
 * The Tariff endpoint.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command;

use PortaText\Exception\NotImplemented;

/**
 * The Tariff endpoint.
 */
class Tariff extends Base
{
    /**
     * Sets the tariff country ISO code.
     *
     * @param integer $id The tariff country ISO code.
     *
     * @return PortaText\Command\ICommand
     */
    public function forCountry($id)
    {
        return $this->setArgument("id", $id);
    }

    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    public function endpoint($method)
    {
        $endpoint = "tariffs";
        $id = $this->getArgument("id");
        if (!is_null($id)) {
            $endpoint .= "/$id";
        }
        return $endpoint;
    }
}
