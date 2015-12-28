<?php
/**
 * The me/settings endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_settings Settings endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The me/settings endpoint.
 */
class Settings extends Base
{
    /**
     * Dont send an alert by email on low credit.
     *
     * @return PortaText\Command\ICommand
     */
    public function dontAlertOnLowCredit()
    {
        return $this->setArgument("alert_when_credit_less_than", null);
    }

    /**
     * Sends an alert by email when credit reaches the given threshold.
     *
     * @param integer $value Credit threshold.
     *
     * @return PortaText\Command\ICommand
     */
    public function alertWhenCreditLessThan($value)
    {
        return $this->setArgument("alert_when_credit_less_than", $value);
    }

    /**
     * Don't send emails on inbound messages.
     *
     * @return PortaText\Command\ICommand
     */
    public function dontSendInboundByEmail()
    {
        return $this->setArgument("email_on_inbound_sms", null);
    }

    /**
     * Set email where to send inbound messages to.
     *
     * @param string $email Use this email to send inbound messages.
     *
     * @return PortaText\Command\ICommand
     */
    public function sendInboundByEmail($email)
    {
        return $this->setArgument("email_on_inbound_sms", $email);
    }

    /**
     * Enables auto recharges.
     *
     * @param integer $whenCredit Autorecharge when credit reaches this amount.
     * @param integer $cardId Credit card ID to use for autorecharges.
     * @param float $total Total money to autorecharge.
     *
     * @return PortaText\Command\ICommand
     */
    public function enableAutoRecharges($whenCredit, $cardId, $total)
    {
        $this->setArgument("autorecharge_enabled", true);
        $this->setArgument("autorecharge_card_id", $cardId);
        $this->setArgument("autorecharge_total", $total);
        return $this->setArgument("autorecharge_when_credit", $whenCredit);
    }

    /**
     * Disables auto recharges.
     *
     * @return PortaText\Command\ICommand
     */
    public function disableAutoRecharges()
    {
        return $this->setArgument("autorecharge_enabled", false);
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
        return "me/settings";
    }
}
