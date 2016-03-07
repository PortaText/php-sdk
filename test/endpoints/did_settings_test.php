<?php
/**
 * Did Settings command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Did Settings command tests.
 */
class DidSettingsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_get_all_dids()
    {
        $this->mockClientForCommand("dids")
        ->didSettings()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_one_did()
    {
        $this->mockClientForCommand("dids/12223334444")
        ->didSettings()
        ->forNumber('12223334444')
        ->get();
    }

    /**
     * @test
     */
    public function can_enable_cnam()
    {
        $this->mockClientForCommand("dids/12223334444", array(
            "cnam_enabled" => true
        ))
        ->didSettings()
        ->forNumber("12223334444")
        ->enableCnam()
        ->patch();
    }

    /**
     * @test
     */
    public function can_disable_cnam()
    {
        $this->mockClientForCommand("dids/12223334444", array(
            "cnam_enabled" => false
        ))
        ->didSettings()
        ->forNumber("12223334444")
        ->disableCnam()
        ->patch();
    }

    /**
     * @test
     */
    public function can_disable_autoresponder()
    {
        $this->mockClientForCommand("dids/12223334444", array(
            "autoresponder_enabled" => false
        ))
        ->didSettings()
        ->forNumber("12223334444")
        ->dontAutoRespond()
        ->patch();
    }

    /**
     * @test
     */
    public function can_enable_autoresponder()
    {
        $this->mockClientForCommand("dids/12223334444", array(
            "autoresponder_text" => "Thanks for contacting us",
            "autoresponder_enabled" => true
        ))
        ->didSettings()
        ->forNumber("12223334444")
        ->autoRespondWith("Thanks for contacting us")
        ->patch();
    }
}
