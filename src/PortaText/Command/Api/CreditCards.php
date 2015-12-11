<?php
/**
 * The me/credit_cards endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_credit_cards CreditCards endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The me/settings endpoint.
 */
class CreditCards extends Base
{
    /**
     * Sets the credit card id.
     *
     * @param integer $cardId Credit Card id.
     *
     * @return PortaText\Command\ICommand
     */
    public function withId($cardId)
    {
        return $this->setArgument("id", $cardId);
    }

    /**
     * Set name on card.
     *
     * @param string $firstname The firstname.
     * @param string $lastname The lastname.
     *
     * @return PortaText\Command\ICommand
     */
    public function nameOnCard($firstname, $lastname)
    {
        $this->setArgument('first_name', $firstname);
        return $this->setArgument('last_name', $lastname);
    }

    /**
     * Set lastname.
     *
     * @param string $number The card number.
     * @param string $expirationDate In format: YYYY-MM.
     * @param string $code The card security code.
     *
     * @return PortaText\Command\ICommand
     */
    public function cardInfo($number, $expirationDate, $code)
    {
        $this->setArgument('card_number', $number);
        $this->setArgument('card_expiration_date', $expirationDate);
        return $this->setArgument('card_code', $code);
    }

    /**
     * Set lastname.
     *
     * @param string $streetAddress The full street address.
     * @param string $city The city name.
     * @param string $state The state name.
     * @param string $zip The ZIP code.
     * @param string $country The country name.
     *
     * @return PortaText\Command\ICommand
     */
    public function address($streetAddress, $city, $state, $zip, $country)
    {
        $this->setArgument('address', $streetAddress);
        $this->setArgument('city', $city);
        $this->setArgument('state', $state);
        $this->setArgument('zip', $zip);
        return $this->setArgument('country', $country);
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
        $endpoint = "me/credit_cards";
        $cardId = $this->getArgument("id");
        if (!is_null($cardId)) {
            $endpoint .= "/$cardId";
            $this->delArgument("id");
        }
        return $endpoint;
    }
}
