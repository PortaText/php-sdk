<?php
/**
 * Generic command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Generic command tests.
 */
class CommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function cannot_use_unknown_command()
    {
        $client = new CustomClient(400, array(), '{"success": "false"}');
        $client->someInvalidCommand();
    }

    /**
     * @test
     */
    public function can_use_command_post()
    {
        $client = $this
            ->getMockBuilder('PortaText\Client\Base')
            ->setMethods(array('run', 'execute', 'customCommand'))
            ->getMock();
        $client
          ->expects($this->exactly(4))
          ->method('customCommand')
          ->withConsecutive(array(), array(), array(), array())
          ->will($this->onConsecutiveCalls(
            $client->__call('customCommand', array()),
            $client->__call('customCommand', array()),
            $client->__call('customCommand', array()),
            $client->__call('customCommand', array())
          ));
        $client
            ->expects($this->exactly(4))
            ->method('run')
            ->withConsecutive(
                array(
                    $this->equalTo("customCommandEndpoint"),
                    $this->equalTo('get'),
                    $this->equalTo('application/json'),
                    $this->callback(function($body) {
                        $body = json_decode($body, true);
                        return $body["argument1"] === "aValue";
                    }),
                    $this->equalTo(null)
                ),
                array(
                    $this->equalTo("customCommandEndpoint"),
                    $this->equalTo('post'),
                    $this->equalTo('application/json'),
                    $this->callback(function($body) {
                        $body = json_decode($body, true);
                        return $body["argument1"] === "aValue";
                    }),
                    $this->equalTo(null)
                ),
                array(
                    $this->equalTo("customCommandEndpoint"),
                    $this->equalTo('put'),
                    $this->equalTo('application/json'),
                    $this->callback(function($body) {
                        $body = json_decode($body, true);
                        return $body["argument1"] === "aValue";
                    }),
                    $this->equalTo(null)
                ),
                array(
                    $this->equalTo("customCommandEndpoint"),
                    $this->equalTo('delete'),
                    $this->equalTo('application/json'),
                    $this->callback(function($body) {
                        $body = json_decode($body, true);
                        return $body["argument1"] === "aValue";
                    }),
                    $this->equalTo(null)
                )
            );
        $client->setApiKey("anapikey");
        $client->customCommand()->anArgument("aValue")->get();
        $client->customCommand()->anArgument("aValue")->post();
        $client->customCommand()->anArgument("aValue")->put();
        $client->customCommand()->anArgument("aValue")->delete();
    }
}
