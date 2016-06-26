<?php
/**
 * Version command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Version command tests.
 */
class VersionTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_get_version()
    {
        $this->mockClientForCommand("version")
        ->version()
        ->get();
    }
}
