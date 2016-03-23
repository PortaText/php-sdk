<?php
/**
 * SMS Services command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * SMS Services command tests.
 */
class SmsServicesTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_export_all_subscribers_to_csv()
    {
        $this->mockClientForCommand(
            "sms_services/55/subscribers", '', 'application/json', 'text/csv'
        )
        ->services()
        ->id(55)
        ->saveTo("/tmp/variables.csv")
        ->get();
    }

    /**
     * @test
     */
    public function can_paginate_subscribers()
    {
        $this->mockClientForCommand("sms_services/55/subscribers?page=44")
        ->services()
        ->id(55)
        ->page(44)
        ->get();
    }

    /**
     * @test
     */
    public function can_get_all_services()
    {
        $this->mockClientForCommand("sms_services")
        ->services()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_one_service()
    {
        $this->mockClientForCommand("sms_services/55")
        ->services()
        ->id(55)
        ->get();
    }
    ///**
    // * @test
    // */
    //public function can_delete_all_variables()
    //{
    //    $this->mockClientForCommand("contacts/12223334444/variables")
    //    ->contacts()
    //    ->id("12223334444")
    //    ->delete();
    //}
//
    ///**
    // * @test
    // */
    //public function can_delete_one_variable()
    //{
    //    $this->mockClientForCommand("contacts/12223334444/variables/first_name")
    //    ->contacts()
    //    ->id("12223334444")
    //    ->name("first_name")
    //    ->delete();
    //}
//
    ///**
    // * @test
    // */
    //public function can_get_all_variables()
    //{
    //    $this->mockClientForCommand("contacts/12223334444/variables")
    //    ->contacts()
    //    ->id("12223334444")
    //    ->get();
    //}
//
    ///**
    // * @test
    // */
    //public function can_get_one_variable()
    //{
    //    $this->mockClientForCommand("contacts/12223334444/variables/first_name")
    //    ->contacts()
    //    ->id("12223334444")
    //    ->name("first_name")
    //    ->get();
    //}
//
    ///**
    // * @test
    // */
    //public function can_set_all_variables()
    //{
    //    $this->mockClientForCommand("contacts/12223334444/variables", array(
    //        "variables" => array(
    //            array("key" => "first_name", "value" => "John"),
    //            array("key" => "last_name", "value" => "Doe")
    //        )
    //    ))
    //    ->contacts()
    //    ->id("12223334444")
    //    ->setAll(array(
    //        "first_name" => "John",
    //        "last_name" => "Doe"
    //    ))
    //    ->put();
    //}
//
    ///**
    // * @test
    // */
    //public function can_set_one_variable()
    //{
    //    $this->mockClientForCommand(
    //        "contacts/12223334444/variables/first_name", array(
    //            "value" => "John"
    //        )
    //    )
    //    ->contacts()
    //    ->id("12223334444")
    //    ->set("first_name", "John")
    //    ->get();
    //}
//

//
    ///**
    // * @test
    // */
    //public function can_export_all_variables_with_contact_lists()
    //{
    //    $this->mockClientForCommand(
    //        "contacts?with_contact_lists=true",
    //        '',
    //        'application/json',
    //        'text/csv'
    //    )
    //    ->contacts()
    //    ->saveTo("/tmp/variables.csv")
    //    ->withContactLists()
    //    ->get();
    //}
//
//
//
    ///**
    // * @test
    // */
    //public function can_import_all_variables_from_csv()
    //{
    //    $this->mockClientForCommand(
    //        "contacts",
    //        'file:/tmp/variables.csv',
    //        'text/csv',
    //        'application/json'
    //    )
    //    ->contacts()
    //    ->csv("/tmp/variables.csv")
    //    ->put();
    //}
}
