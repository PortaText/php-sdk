<?php
/**
 * Calls command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Calls command tests.
 */
class CallsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_search()
    {
        $this->mockClientForCommand(
            "calls?page=1&date_from=2017-01-01T10%3A00%3A00"
        )
        ->calls()
        ->search(array(
            'page' => 1,
            'date_from' => '2017-01-01T10:00:00'
        ))
        ->get();
    }

    /**
     * @test
     */
    public function can_issue_call()
    {
        $this->mockClientForCommand("calls", array(
            "from" => "12223334444",
            "to" => "14445556666",
            "outbound_trunk_id" => 44,
            "dial_timeout" => 120,
            "flow" => array(
                array("wait" => array("seconds" => 5)),
                array("play" => array("sound_id" => 3))
            )
        ))
        ->calls()
        ->from("12223334444")
        ->to("14445556666")
        ->outboundTrunk(44)
        ->dialTimeout(120)
        ->flow(array(
            array("wait" => array("seconds" => 5)),
            array("play" => array("sound_id" => 3))
        ))
        ->post();
    }
}