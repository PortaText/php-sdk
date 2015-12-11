<?php
/**
 * SMS command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * SMS command tests.
 */
class SmsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_send_message_with_template()
    {
        $this->mockClientForCommand("sms", array(
            "from" => "12223334444",
            "to" => "15556667777",
            "template_id" => 44,
            "variables" => array("var1" => "value"),
            "client_ref" => "custom_client_ref"
        ))
        ->sms()
        ->sendFrom("12223334444")
        ->sendTo("15556667777")
        ->useTemplate(44, array("var1" => "value"))
        ->clientRef("custom_client_ref")
        ->post();
    }

    /**
     * @test
     */
    public function can_send_message_with_text()
    {
        $this->mockClientForCommand("sms", array(
            "from" => "12223334444",
            "to" => "15556667777",
            "text" => "hello world",
            "client_ref" => "custom_client_ref"
        ))
        ->sms()
        ->sendFrom("12223334444")
        ->sendTo("15556667777")
        ->text("hello world")
        ->clientRef("custom_client_ref")
        ->post();
    }

    /**
     * @test
     */
    public function can_get_sms_operation()
    {
        $this->mockClientForCommand("sms/763")
        ->sms()
        ->withId(763)
        ->get();
    }
}
