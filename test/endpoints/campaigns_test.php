<?php
/**
 * Campaigns command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Campaigns command tests.
 */
class CampaignsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_create_telephony_campaigns()
    {
        $this->mockClientForCommand("campaigns", array(
            "type" => "telephony",
            "name" => "this is the name",
            "description" => "and this is the description",
            "from" => "12223334444",
            "contact_list_ids" => array(1, 3, 5, 7, 9),
            "settings" => array(
                "iterations" => 3,
                "agents" => 20,
                "post_call_work_duration" => 15,
                "min_iteration_time" => 5,
                "outbound_trunk_id" => 44
            )
        ))
        ->telCampaign()
        ->name("this is the name")
        ->description("and this is the description")
        ->from("12223334444")
        ->toContactLists(array(1, 3, 5, 7, 9))
        ->iterations(3)
        ->agents(20)
        ->postCallWorkDuration(15)
        ->minIterationTime(5)
        ->outboundTrunk(44)
        ->post();
    }

    /**
     * @test
     */
    public function can_get_paginated_list_of_campaigns()
    {
        $this->mockClientForCommand("campaigns?page=44")
        ->campaigns()
        ->page(44)
        ->get();
    }

    /**
     * @test
     */
    public function can_get_paginated_contacts()
    {
        $this->mockClientForCommand("campaigns/123/contacts?page=44")
        ->campaigns()
        ->id(123)
        ->contacts()
        ->page(44)
        ->get();
    }

    /**
     * @test
     */
    public function can_export_all_contacts()
    {
        $this->mockClientForCommand(
            "campaigns/123/contacts",
            '',
            'application/json',
            'text/csv'
        )
        ->campaigns()
        ->id(123)
        ->contacts()
        ->saveTo("/tmp/contacts.csv")
        ->get();
    }

    /**
     * @test
     */
    public function can_create_sms_campaign_from_csv()
    {
        $qs = http_build_query(array(
            "settings" => json_encode(array(
                "type" => "sms",
                "name" => "this is the name",
                "description" => "and this is the description",
                "from" => "12223334444",
                "settings" => array(
                    "text" => "Hello world"
                )
            ))
        ));
        $this->mockClientForCommand(
            "campaigns?$qs",
            'file:/tmp/contacts.csv',
            'text/csv',
            'application/json'
        )
        ->smsCampaign()
        ->name("this is the name")
        ->description("and this is the description")
        ->csv("/tmp/contacts.csv")
        ->from("12223334444")
        ->text("Hello world")
        ->post();
    }

    /**
     * @test
     */
    public function can_schedule_sms_campaign()
    {
        $this->mockClientForCommand("campaigns", array(
            "type" => "sms",
            "name" => "this is the name",
            "description" => "and this is the description",
            "contact_list_ids" => array(1, 3, 5, 7, 9),
            "from" => "12223334444",
            "settings" => array(
                "text" => "Hello world"
            ),
            "schedule" => array(
                "any_day" => array(
                    "from" => "13:50",
                    "to" => "18:44"
                )
            )
        ))
        ->smsCampaign()
        ->name("this is the name")
        ->description("and this is the description")
        ->toContactLists(array(1, 3, 5, 7, 9))
        ->from("12223334444")
        ->text("Hello world")
        ->schedule("any_day", array(
            "from" => "13:50",
            "to" => "18:44"
        ))
        ->post();
    }

    /**
     * @test
     */
    public function can_create_sms_campaign_with_text()
    {
        $this->mockClientForCommand("campaigns", array(
            "type" => "sms",
            "name" => "this is the name",
            "description" => "and this is the description",
            "contact_list_ids" => array(1, 3, 5, 7, 9),
            "from" => "12223334444",
            "settings" => array(
                "text" => "Hello world"
            )
        ))
        ->smsCampaign()
        ->name("this is the name")
        ->description("and this is the description")
        ->toContactLists(array(1, 3, 5, 7, 9))
        ->from("12223334444")
        ->text("Hello world")
        ->post();
    }

    /**
     * @test
     */
    public function can_create_sms_campaign_with_template()
    {
        $this->mockClientForCommand("campaigns", array(
            "type" => "sms",
            "name" => "this is the name",
            "description" => "and this is the description",
            "contact_list_ids" => array(1, 3, 5, 7, 9),
            "from" => "12223334444",
            "settings" => array(
                "template_id" => 987,
                "variables" => array("key1" => "value1")
            )
        ))
        ->smsCampaign()
        ->name("this is the name")
        ->description("and this is the description")
        ->toContactLists(array(1, 3, 5, 7, 9))
        ->from("12223334444")
        ->useTemplate(987, array("key1" => "value1"))
        ->post();
    }

    /**
     * @test
     */
    public function can_create_sms_campaign_from_sms_service()
    {
        $this->mockClientForCommand("campaigns", array(
            "type" => "sms",
            "name" => "this is the name",
            "description" => "and this is the description",
            "service_id" => 55,
            "all_subscribers" => true,
            "settings" => array(
                "template_id" => 987,
                "variables" => array("key1" => "value1")
            )
        ))
        ->smsCampaign()
        ->name("this is the name")
        ->description("and this is the description")
        ->fromService(55)
        ->allSubscribers()
        ->useTemplate(987, array("key1" => "value1"))
        ->post();
    }

    /**
     * @test
     */
    public function can_delete_a_campaign()
    {
        $this->mockClientForCommand("campaigns/451")
        ->campaigns()
        ->id(451)
        ->delete();
    }

    /**
     * @test
     */
    public function can_get_all_campaigns()
    {
        $this->mockClientForCommand("campaigns")
        ->campaigns()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_a_campaign()
    {
        $this->mockClientForCommand("campaigns/429")
        ->campaigns()
        ->id(429)
        ->get();
    }
}
