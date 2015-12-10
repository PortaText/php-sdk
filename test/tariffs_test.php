<?php
/**
 * Tariffs command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Tariffs command tests.
 */
class TariffsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_get_all_tariffs()
    {
        $this->mockClientForCommand("tariffs")
        ->tariffs()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_one_tariff()
    {
        $this->mockClientForCommand("tariffs/us")
            ->tariffs()
            ->forCountry("us")
            ->get();
    }
}
