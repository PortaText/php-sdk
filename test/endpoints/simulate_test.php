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
        $this->mockClientForCommand("simulate", array(
            "country" => "us",
            "template_id" => 44,
            "variables" => array("var1" => "value")
        ))
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
        $this->mockClientForCommand("simulate", array(
            "country" => "us",
            "text" => "hello world"
        ))
        ->simulate()
        ->country("us")
        ->text("hello world")
        ->get();
    }
}
