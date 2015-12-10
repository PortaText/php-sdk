<?php
/**
 * Templates command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Templates command tests.
 */
class TemplatesTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_get_all_templates()
    {
        $this->mockClientForCommand("templates")
        ->templates()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_one_template()
    {
        $this->mockClientForCommand("templates/763")
            ->templates()
            ->withId(763)
            ->get();
    }
}
