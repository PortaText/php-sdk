<?php
/**
 * Operators command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Operators command tests.
 */
class OperatorsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_get_all_operators()
    {
        $this->mockClientForCommand("operators?page=4&sort_by=mcc&order=desc")
        ->operators()
        ->page(4)
        ->sortBy('mcc', 'desc')
        ->get();
    }

    /**
     * @test
     */
    public function can_export_operators()
    {
        $this->mockClientForCommand(
            'operators',
            '',
            'application/json',
            'text/csv'
        )
        ->operators()
        ->saveTo("/tmp/operators.csv")
        ->get();
    }
}
