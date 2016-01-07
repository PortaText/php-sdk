<?php
/**
 * Generic request tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;
use PortaText\Command\Descriptor as Descriptor;

/**
 * Generic request tests.
 */
class BaseClient extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function can_issue_request_with_right_headers_and_body()
    {
        $client = $this
            ->getMockBuilder('PortaText\Client\Base')
            ->setMethods(array('execute'))
            ->getMock();
        $client
            ->expects($this->once())
            ->method('execute')
            ->with($this->callback(function($descriptor) {
                $uri = Client::$defaultEndpoint . "/endpoint/subpath";
                return
                    $descriptor->uri === $uri &&
                    $descriptor->method === "amethod" &&
                    count(array_diff($descriptor->headers, array(
                        "X-Api-Key" => "anapikey",
                        "Accept" => "accept content type",
                        "Content-Type" => "content type"
                    )) === 0) &&
                    $descriptor->body === "a body" &&
                    $descriptor->outputFile === "output File";
            }))
            ->will($this->returnValue(array(200, array(), "")));
        $client
            ->setApiKey("anapikey")
            ->run(
                "endpoint/subpath",
                "amethod",
                "content type",
                "accept content type",
                "a body",
                "output File"
            );
    }
}


