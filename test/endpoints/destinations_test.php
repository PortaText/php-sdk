<?php
/**
 * Destinations command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Destinations command tests.
 */
class DestinationsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_get_all_destinations()
    {
        $this->mockClientForCommand(
            "destinations?page=4&sort_by=destination&order=desc"
        )
        ->destinations()
        ->page(4)
        ->sortBy('destination', 'desc')
        ->get();
    }
}
