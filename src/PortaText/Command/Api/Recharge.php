<?php
/**
 * The Recharge endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_recharge Recharge endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Recharge endpoint.
 */
class Recharge extends Base
{
    /**
     * Sets the card id to use.
     *
     * @param integer $cardId The card id.
     *
     * @return PortaText\Command\ICommand
     */
    public function withCard($cardId)
    {
        return $this->setArgument('card_id', $cardId);
    }

    /**
     * Set Name.
     *
     * @param float $total Total credits to recharge.
     *
     * @return PortaText\Command\ICommand
     */
    public function total($total)
    {
        return $this->setArgument('total', $total);
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
        return "recharge";
    }
}
