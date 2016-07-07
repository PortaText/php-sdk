<?php
/**
 * SMS Simulate command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * SMS Simulate command tests.
 */
class SimulateTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_simulate_message_with_template()
    {
        $qs = "template_id=44&variables=%7B%22var1%22%3A%22value%22%7D&country=us";
        $this->mockClientForCommand("simulate?$qs")
        ->simulate()
        ->country("us")
        ->useTemplate(44, array("var1" => "value"))
        ->get();
    }

    /**
     * @test
     */
    public function can_simulate_message_with_text()
    {
        $this->mockClientForCommand("simulate?text=hello+world&country=us")
        ->simulate()
        ->country("us")
        ->text("hello world")
        ->get();
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function cant_simulate_without_country()
    {
        $this->mockClientForCommand()->simulate()->get();
    }
}
