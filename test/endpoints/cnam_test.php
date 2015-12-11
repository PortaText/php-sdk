<?php
/**
 * CNAM command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * CNAM command tests.
 */
class CnamTest extends BaseCommandTest
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function cannot_request_cnam_for_null_did()
    {
        $this->mockClientForCommand(null)->cnam()->get();
    }

    /**
     * @test
     */
    public function can_request_cnam()
    {
        $this->mockClientForCommand("cnam/12223334444")
        ->cnam()
        ->forNumber("12223334444")
        ->post();
    }
}
