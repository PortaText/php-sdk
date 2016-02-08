<?php
/**
 * Number Verify command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Number Verify command tests.
 */
class NumberVerifyTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_send_verification_code()
    {
        $this->mockClientForCommand("number_verify/12223334444", array(
            "from" => "13334445555",
            "template_id" => 44,
            "variables" => array("var1" => "value")
        ))
        ->numberVerify()
        ->forNumber("12223334444")
        ->from("13334445555")
        ->useTemplate(44, array("var1" => "value"))
        ->post();
    }

    /**
     * @test
     */
    public function can_verify_code()
    {
        $this->mockClientForCommand("number_verify/12223334444?code=123456")
        ->numberVerify()
        ->forNumber("12223334444")
        ->verifyWith("123456")
        ->get();
    }
}
