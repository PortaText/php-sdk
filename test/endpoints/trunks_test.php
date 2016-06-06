<?php
/**
 * Trunks command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Trunks command tests.
 */
class TrunksTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_delete_trunk()
    {
        $this->mockClientForCommand("trunks/44")
        ->trunks()
        ->id(44)
        ->delete();
    }

    /**
     * @test
     */
    public function can_update_trunk()
    {
        $this->mockClientForCommand("trunks/44", array(
            "name" => "a trunk",
            "ip" => "1.2.3.4"
        ))
        ->trunks()
        ->id(44)
        ->name("a trunk")
        ->ip("1.2.3.4")
        ->put();
    }

    /**
     * @test
     */
    public function can_save_trunk()
    {
        $this->mockClientForCommand("trunks", array(
            "name" => "a trunk",
            "ip" => "1.2.3.4"
        ))
        ->trunks()
        ->name("a trunk")
        ->ip("1.2.3.4")
        ->post();
    }

    /**
     * @test
     */
    public function can_get_all_trunks()
    {
        $this->mockClientForCommand("trunks")
        ->trunks()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_one_trunk()
    {
        $this->mockClientForCommand("trunks/763")
        ->trunks()
        ->id(763)
        ->get();
    }
}
