<?php
/**
 * Command tests SuperClass.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

/**
 * Command tests SuperClass.
 */
class BaseCommandTest extends \PHPUnit_Framework_TestCase
{
    protected function mockClientForCommand(
        $assertEndpoint,
        $assertBody = '',
        $assertContentType = 'application/json'
    ) {
        $client = $this
            ->getMockBuilder('PortaText\Client\Base')
            ->setMethods(array('run', 'execute'))
            ->getMock();
        $client
            ->expects($this->exactly(1))
            ->method('run')
            ->with(
              $this->equalTo($assertEndpoint),
              $this->anything(),
              $this->equalTo($assertContentType),
              $this->callback(function($body) use (&$assertBody) {
                  return $assertBody === $body;
              }),
              $this->anything()
          );
        $client->setApiKey("anapikey");
        return $client;
    }
}
