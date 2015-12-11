<?php
/**
 * Email Verify command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Email Verify command tests.
 */
class EmailVerifyTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_request_email_verification()
    {
        $this->mockClientForCommand("me/email_verify")->emailVerify()->post();
    }

    /**
     * @test
     */
    public function can_verify_email()
    {
        $this->mockClientForCommand("me/email_verify/one_big_nonce")
        ->emailVerify()
        ->withNonce("one_big_nonce")
        ->get();
    }
}
