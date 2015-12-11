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
        $assertEndpoint = null,
        $assertBody = '',
        $assertContentType = 'application/json'
    ) {
        $expectedCalls = 1;
        if(is_null($assertEndpoint)) {
          $expectedCalls = 0;
        }
        $client = $this
            ->getMockBuilder('PortaText\Client\Base')
            ->setMethods(array('run', 'execute'))
            ->getMock();
        $client
            ->expects($this->exactly($expectedCalls))
            ->method('run')
            ->with(
              $this->equalTo($assertEndpoint),
              $this->anything(),
              $this->equalTo($assertContentType),
              $this->callback(function($body) use (&$assertBody) {
                  if (is_array($assertBody)) {
                      $assertBody = json_encode($assertBody);
                  }
                  return $assertBody === $body;
              }),
              $this->anything()
          );
        $client->setApiKey("anapikey");
        return $client;
    }
}
