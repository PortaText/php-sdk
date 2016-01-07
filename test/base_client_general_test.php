<?php
/**
 * Generic client tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;
use PortaText\Command\Descriptor as Descriptor;
use Psr\Log\NullLogger;

/**
 * Generic client tests.
 */
class BaseClientGeneral extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function can_set_logger()
    {
        $client = new CustomClient;
        $client->setLogger(new NullLogger);
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function can_set_endpoint()
    {
        $client = $this
            ->getMockBuilder('PortaText\Client\Base')
            ->setMethods(array('execute'))
            ->getMock();
        $client
            ->expects($this->once())
            ->method('execute')
            ->with($this->callback(function($descriptor) {
                $uri = "http://1.2.3.4:80/some_path/endpoint/subpath";
                return $descriptor->uri === $uri;
            }))
            ->will($this->returnValue(array(200, array(), "")));
        $client
            ->setApiKey("anapikey")
            ->setEndpoint("http://1.2.3.4:80/some_path")
            ->run(
                "endpoint/subpath",
                "amethod",
                "content type",
                "accept content type",
                "a body"
            );
    }
}
