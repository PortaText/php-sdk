<?php
/**
 * Blacklist command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Blacklist command tests.
 */
class BlacklistTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_export_blacklist()
    {
        $this->mockClientForCommand(
            'blacklist/contacts',
            '',
            'application/json',
            'text/csv'
        )
        ->blacklist()
        ->saveTo("/tmp/blacklist.csv")
        ->get();
    }

    /**
     * @test
     */
    public function can_blacklist_number()
    {
        $this->mockClientForCommand("blacklist/12223334444")
        ->blacklist()
        ->number("12223334444")
        ->put();
    }

    /**
     * @test
     */
    public function can_unblacklist_number()
    {
        $this->mockClientForCommand("blacklist/12223334444")
        ->blacklist()
        ->number("12223334444")
        ->delete();
    }

    /**
     * @test
     */
    public function can_blacklist_csv()
    {
        $this->mockClientForCommand(
            "blacklist/contacts",
            "file:/tmp/a.csv",
            "text/csv"
        )
        ->blacklist()
        ->csv("/tmp/a.csv")
        ->put();
    }
}
