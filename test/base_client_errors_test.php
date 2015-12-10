<?php
namespace PortaText\Test;

use PortaText\Client\Base as BaseClient;
use PortaText\Command\Descriptor as Descriptor;

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
}

class CustomClient extends BaseClient
{
    protected $resultData = array();

    public function run(
        $endpoint = "endpoint",
        $method = "get",
        $contentType = "application/json",
        $body = "",
        $authType = null
    )
    {
        return parent::run($endpoint, $method, $contentType, $body, $authType);
    }

    public function execute($descriptor)
    {
        return $this->resultData;
    }

    public function __construct($retCode, $retHeaders, $retBody)
    {
        parent::__construct();
        $this->resultData = array($retCode, $retHeaders, $retBody);
    }
}

