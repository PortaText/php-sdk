<?php
/**
 * Me command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Me command tests.
 */
class MeTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_put_me()
    {
        $this->mockClientForCommand("me", array(
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => "john@doe.com",
            "company" => "Mr. spiffy",
            "callback_url" => null,
            "timezone" => "UTC"
        ))
        ->me()
        ->name("John", "Doe")
        ->email("john@doe.com")
        ->company("Mr. spiffy")
        ->callbackUrl(null)
        ->timezone("UTC")
        ->put();
    }

    /**
     * @test
     */
    public function can_get_me()
    {
        $this->mockClientForCommand("me")
        ->me()
        ->get();
    }
}
