<?php
/**
 * Tests for generic request errors.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as BaseClient;
use PortaText\Command\Descriptor as Descriptor;

/**
 * Tests for generic request errors.
 */
class BaseClientErrors extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function cannot_use_invalid_authentication_type()
    {
        $client = new CustomClient(400, array(), '{"success": "false"}');
        $client->run("a", "b", "c", "d", "e");
    }

    /**
     * @test
     * @expectedException PortaText\Exception\ClientError
     */
    public function cannot_request_on_client_error()
    {
        $client = new CustomClient(400, array(), '{"success": "false"}');
        $client->run();
    }

    /**
     * @test
     * @expectedException PortaText\Exception\InvalidCredentials
     */
    public function cannot_request_on_invalid_credentials()
    {
        $client = new CustomClient(401, array(), '{"success": "false"}');
        $client->run();
    }

    /**
     * @test
     * @expectedException PortaText\Exception\PaymentRequired
     */
    public function cannot_request_on_payment_required()
    {
        $client = new CustomClient(402, array(), '{"success": "false"}');
        $client->run();
    }

    /**
     * @test
     * @expectedException PortaText\Exception\Forbidden
     */
    public function cannot_request_on_forbidden()
    {
        $client = new CustomClient(403, array(), '{"success": "false"}');
        $client->run();
    }

    /**
     * @test
     * @expectedException PortaText\Exception\NotFound
     */
    public function cannot_request_on_not_found()
    {
        $client = new CustomClient(404, array(), '{"success": "false"}');
        $client->run();
    }

    /**
     * @test
     * @expectedException PortaText\Exception\InvalidMethod
     */
    public function cannot_request_on_invalid_method()
    {
        $client = new CustomClient(405, array(), '{"success": "false"}');
        $client->run();
    }

    /**
     * @test
     * @expectedException PortaText\Exception\InvalidMedia
     */
    public function cannot_request_on_invalid_media()
    {
        $client = new CustomClient(415, array(), '{"success": "false"}');
        $client->run();
    }

    /**
     * @test
     * @expectedException PortaText\Exception\RateLimited
     */
    public function cannot_request_on_rate_limit()
    {
        $client = new CustomClient(
            429,
            array(
                "X-Rate-Limit-Reset" => (time() + (60 * 5))
            ),
            '{"success": "false"}'
        );
        $client->run();
    }

    /**
     * @test
     * @expectedException PortaText\Exception\ServerError
     */
    public function cannot_request_on_server_error()
    {
        $client = new CustomClient(500, array(), '{"success": "false"}');
        $client->run();
    }

    /**
     * @test
     */
    public function can_return_errors_in_result()
    {
        try
        {
            $result = json_encode(array(
                "success" => false,
                "error_description" => array(
                    "error1",
                    "error2"
                )
            ));
            $client = new CustomClient(400, array(), $result);
            $client->run();

        } catch(\PortaText\Exception\ClientError $e) {
            $this->assertEquals(
                $e->getResult()->errors(), array("error1", "error2")
            );
        }
    }
}
