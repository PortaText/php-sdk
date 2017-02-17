<?php
/**
 * Plans command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Laura Corvalan <laura@portatext.com>
 * @copyright 2015- PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Plans command tests.
 */
class PlansTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_get_all_plans()
    {
        $this->mockClientForCommand('plans')
        ->plans()
        ->get();
    }
}
