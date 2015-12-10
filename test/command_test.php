<?php
/**
 * Generic command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

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

}
