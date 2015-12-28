<?php
/**
 * Recharge command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Recharge command tests.
 */
class RechargeTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_recharge()
    {
        $this->mockClientForCommand("recharge", array(
            "card_id" => 445522,
            "total" => 150
        ))
        ->recharge()
        ->withCard(445522)
        ->total(150)
        ->post();
    }
}
