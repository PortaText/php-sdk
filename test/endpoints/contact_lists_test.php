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
