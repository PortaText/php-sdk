<?php
/**
 * CampaignsLifecycle command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * CampaignsLifecycle command tests.
 */
class CampaignsLifecycleTest extends BaseCommandTest
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function cannot_act_on_null_campaign()
    {
        $this->mockClientForCommand(null)->campaignLifecycle()->start()->post();
    }

    /**
     * @test
     */
    public function can_start_campaign()
    {
        $this->mockClientForCommand("campaigns/391/lifecycle", array(
            "action" => "start"
        ))
        ->campaignLifecycle()
        ->id(391)
        ->start()
        ->post();
    }

    /**
     * @test
     */
    public function can_pause_campaign()
    {
        $this->mockClientForCommand("campaigns/391/lifecycle", array(
            "action" => "pause"
        ))
        ->campaignLifecycle()
        ->id(391)
        ->pause()
        ->post();
    }

    /**
     * @test
     */
    public function can_resume_campaign()
    {
        $this->mockClientForCommand("campaigns/391/lifecycle", array(
            "action" => "resume"
        ))
        ->campaignLifecycle()
        ->id(391)
        ->resume()
        ->post();
    }

    /**
     * @test
     */
    public function can_cancel_campaign()
    {
        $this->mockClientForCommand("campaigns/391/lifecycle", array(
            "action" => "cancel"
        ))
        ->campaignLifecycle()
        ->id(391)
        ->cancel()
        ->post();
    }
}
