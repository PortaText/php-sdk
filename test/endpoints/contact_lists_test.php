<?php
/**
 * ContactLists command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * ContactLists command tests.
 */
class ContactListsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_paginate_contacts()
    {
        $this->mockClientForCommand('contact_lists/33/contacts?page=55')
        ->contactLists()
        ->id(33)
        ->page(55)
        ->get();
    }

    /**
     * @test
     */
    public function can_add_number_to_contact_list()
    {
        $this->mockClientForCommand('contact_lists/33/contacts/12223334444')
        ->contactLists()
        ->id(33)
        ->withNumber('12223334444')
        ->put();
    }

    /**
     * @test
     */
    public function can_add_number_to_contact_list_with_variables()
    {
        $this->mockClientForCommand(
            'contact_lists/33/contacts/12223334444', array(
            "variables" => array(
                array("key" => "first_name", "value" => "John"),
                array("key" => "last_name", "value" => "Doe")
            )
        ))
        ->contactLists()
        ->id(33)
        ->withNumber('12223334444', array(
            "first_name" => "John",
            "last_name" => "Doe"
        ))
        ->put();
    }

    /**
     * @test
     */
    public function can_delete_number_from_contact_list()
    {
        $this->mockClientForCommand('contact_lists/33/contacts/12223334444')
        ->contactLists()
        ->id(33)
        ->withNumber('12223334444')
        ->delete();
    }

    /**
     * @test
     */
    public function can_export_contact_list()
    {
        $this->mockClientForCommand(
            'contact_lists/33/contacts',
            '',
            'application/json',
            'text/csv'
        )
        ->contactLists()
        ->id(33)
        ->saveTo("/tmp/contact_list.csv")
        ->get();
    }

    /**
     * @test
     */
    public function can_create_contact_list()
    {
        $this->mockClientForCommand("contact_lists", array(
            "name" => "this is the name",
            "description" => "and this is the description"
        ))
        ->contactLists()
        ->name("this is the name")
        ->description("and this is the description")
        ->post();
    }

    /**
     * @test
     */
    public function can_update_contact_list()
    {
        $this->mockClientForCommand("contact_lists/421", array(
            "name" => "a new name",
            "description" => "a new description"
        ))
        ->contactLists()
        ->id(421)
        ->name("a new name")
        ->description("a new description")
        ->put();
    }

    /**
     * @test
     */
    public function can_delete_contact_list()
    {
        $this->mockClientForCommand("contact_lists/421")
        ->contactLists()
        ->id(421)
        ->delete();
    }

    /**
     * @test
     */
    public function can_upload_csv()
    {
        $this->mockClientForCommand(
            "contact_lists/421/contacts",
            "file:/tmp/a.csv",
            "text/csv"
        )
        ->contactLists()
        ->id(421)
        ->csv("/tmp/a.csv")
        ->put();
    }
}
