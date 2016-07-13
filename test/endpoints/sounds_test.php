<?php
/**
 * Sounds command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Sounds command tests.
 */
class SoundsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_delete_sound()
    {
        $this->mockClientForCommand("sounds/44")
        ->sounds()
        ->id(44)
        ->delete();
    }

    /**
     * @test
     */
    public function can_update_sound()
    {
        $qs = http_build_query(array(
            "name" => "a sound",
            "description" => "super duper sound"
        ));
        $this->mockClientForCommand(
            "sounds?$qs",
            'file:/tmp/sound.mp3',
            'audio/mpeg',
            'application/json'
        )
        ->sounds()
        ->name("a sound")
        ->description("super duper sound")
        ->sound("/tmp/sound.mp3")
        ->patch();
    }

    /**
     * @test
     */
    public function can_update_sound_without_file()
    {
        $qs = http_build_query(array(
            "name" => "a sound",
            "description" => "super duper sound"
        ));
        $this->mockClientForCommand("sounds?$qs")
        ->sounds()
        ->name("a sound")
        ->description("super duper sound")
        ->patch();
    }

    /**
     * @test
     */
    public function can_create_sound()
    {
        $qs = http_build_query(array(
            "name" => "a sound",
            "description" => "super duper sound"
        ));
        $this->mockClientForCommand(
            "sounds?$qs",
            'file:/tmp/sound.mp3',
            'audio/mpeg',
            'application/json'
        )
        ->sounds()
        ->name("a sound")
        ->description("super duper sound")
        ->sound("/tmp/sound.mp3")
        ->post();
    }

    /**
     * @test
     */
    public function can_get_all_sounds()
    {
        $this->mockClientForCommand("sounds")
        ->sounds()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_one_sound_file()
    {
        $this->mockClientForCommand(
            'sounds/763',
            '',
            'application/json',
            'audio/mpeg'
        )
        ->sounds()
        ->id(763)
        ->saveTo('/tmp/sound.mp3')
        ->get();
    }

    /**
     * @test
     */
    public function can_get_one_sound()
    {
        $this->mockClientForCommand("sounds/763")
        ->sounds()
        ->id(763)
        ->get();
    }
}
