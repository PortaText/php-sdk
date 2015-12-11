<?php
/**
 * Settings command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Settings command tests.
 */
class SettingsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_enable_alert_on_low_credit()
    {
        $this->mockClientForCommand("me/settings", array(
            "alert_when_credit_less_than" => 100
        ))
        ->settings()
        ->alertWhenCreditLessThan(100)
        ->get();
    }

    /**
     * @test
     */
    public function can_disable_alert_on_low_credit()
    {
        $this->mockClientForCommand("me/settings", array(
            "alert_when_credit_less_than" => null
        ))
        ->settings()
        ->dontAlertOnLowCredit()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_settings()
    {
        $this->mockClientForCommand("me/settings")
        ->settings()
        ->get();
    }

    /**
     * @test
     */
    public function can_enable_autorecharges()
    {
        $this->mockClientForCommand("me/settings", array(
            "autorecharge_enabled" => true,
            "autorecharge_plan_id" => 2,
            "autorecharge_card_id" => 66543221,
            "autorecharge_total" => 150,
            "autorecharge_when_credit" => 100
        ))
        ->settings()
        ->enableAutoRecharges(100, 66543221, 2, 150)
        ->patch();
    }

    /**
     * @test
     */
    public function can_disable_autorecharges()
    {
        $this->mockClientForCommand("me/settings", array(
            "autorecharge_enabled" => false
        ))
        ->settings()
        ->disableAutoRecharges()
        ->patch();
    }

    /**
     * @test
     */
    public function can_disable_email_in_inbound_sms()
    {
        $this->mockClientForCommand("me/settings", array(
            "email_on_inbound_sms" => null
        ))
        ->settings()
        ->dontSendInboundByEmail()
        ->patch();
    }

    /**
     * @test
     */
    public function can_enable_email_in_inbound_sms()
    {
        $this->mockClientForCommand("me/settings", array(
            "email_on_inbound_sms" => "john@doe.com"
        ))
        ->settings()
        ->sendInboundByEmail("john@doe.com")
        ->patch();
    }
}
