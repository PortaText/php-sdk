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
    public function can_search()
    {
        $this->mockClientForCommand(
            "sms?page=3&date_from=2015-01-01T00%3A00%3A00"
        )
        ->sms()
        ->search(array(
            'page' => 3,
            'date_from' => '2015-01-01T00:00:00'
        ))
        ->get();
    }

    /**
     * @test
     */
    public function can_send_to_contact_lists()
    {
        $this->mockClientForCommand("sms", array(
            "from" => "12223334444",
            "contact_list_ids" => array(1, 2),
            "template_id" => 44,
            "variables" => array("var1" => "value"),
            "client_ref" => "custom_client_ref"
        ))
        ->sms()
        ->from("12223334444")
        ->toContactLists(array(1, 2))
        ->useTemplate(44, array("var1" => "value"))
        ->clientRef("custom_client_ref")
        ->post();
    }

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
        ->from("12223334444")
        ->to("15556667777")
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
        ->from("12223334444")
        ->to("15556667777")
        ->text("hello world")
        ->clientRef("custom_client_ref")
        ->post();
    }

    /**
     * @test
     */
    public function can_send_from_sms_service()
    {
        $this->mockClientForCommand("sms", array(
            "service_id" => 55,
            "to" => "15556667777",
            "text" => "hello world",
            "client_ref" => "custom_client_ref"
        ))
        ->sms()
        ->fromService(55)
        ->to("15556667777")
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
        ->id(763)
        ->get();
    }
}
