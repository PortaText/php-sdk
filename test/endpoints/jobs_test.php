<?php
/**
 * Jobs command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Jobs command tests.
 */
class JobsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_get_all_jobs()
    {
        $this->mockClientForCommand("jobs")
        ->jobs()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_one_job()
    {
        $this->mockClientForCommand("jobs/987")
        ->jobs()
        ->id(987)
        ->get();
    }

    /**
     * @test
     */
    public function can_cancel_job()
    {
        $this->mockClientForCommand("jobs/987")
        ->jobs()
        ->id(987)
        ->delete();
    }
}
