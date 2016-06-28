<?php
/**
 * Inspect command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Inspect command tests.
 */
class InspectTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_inspect_number()
    {
        $this->mockClientForCommand('inspect/12223334444')
        ->inspect()
        ->number('12223334444')
        ->post();
    }

    /**
     * @test
     */
    public function can_inspect_csv()
    {
        $this->mockClientForCommand(
            "inspect",
            "file:/tmp/a.csv",
            "text/csv"
        )
        ->inspect()
        ->csv("/tmp/a.csv")
        ->post();
    }
}
