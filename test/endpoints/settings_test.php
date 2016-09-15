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
    public function can_enable_sns_publishing()
    {
        $this->mockClientForCommand("me/settings", array(
            "sns_publish_enabled" => true,
            "sns_access_key" => "key",
            "sns_access_secret" => "secret",
            "sns_topic" => "topic"
        ))
        ->settings()
        ->publishEventsToSns("key", "secret", "topic")
        ->patch();
    }

    /**
     * @test
     */
    public function can_disable_sns_publishing()
    {
        $this->mockClientForCommand("me/settings", array(
            "sns_publish_enabled" => false
        ))
        ->settings()
        ->dontPublishEventsToSns()
        ->patch();
    }

    /**
     * @test
     */
    public function can_set_amd_settings()
    {
        $this->mockClientForCommand("me/settings", array(
            "amd_initial_silence" => 900,
            "amd_max_greeting_length" => 800,
            "amd_after_greeting_silence" => 700,
            "amd_total_time" => 600,
            "amd_min_word_length" => 500,
            "amd_between_words_silence" => 400,
            "amd_max_words" => 300,
            "amd_silence_threshold" => 200,
            "amd_max_word_length" => 100
        ))
        ->settings()
        ->amdInitialSilence(900)
        ->amdMaxGreetingLength(800)
        ->amdAfterGreetingSilence(700)
        ->amdTotalTime(600)
        ->amdMinWordLength(500)
        ->amdBetweenWordsSilence(400)
        ->amdMaxWords(300)
        ->amdSilenceThreshold(200)
        ->amdMaxWordLength(100)
        ->patch();
    }

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
        ->patch();
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
        ->patch();
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
            "autorecharge_total" => 5000,
            "autorecharge_when_credit" => 100
        ))
        ->settings()
        ->enableAutoRecharges(100, 5000)
        ->patch();
    }

    /**
     * @test
     */
    public function can_set_default_credit_card()
    {
        $this->mockClientForCommand("me/settings", array(
            "default_card_id" => 66543221
        ))
        ->settings()
        ->defaultCreditCard(66543221)
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
