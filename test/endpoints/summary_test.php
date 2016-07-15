<?php
/**
 * Summary command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Summary command tests.
 */
class SummaryTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_get_summary()
    {
        $this->mockClientForCommand("summary")
        ->summary()
        ->get();
    }

    /**
     * @test
     */
    public function can_export_summary()
    {
        $this->mockClientForCommand(
            'summary',
            '',
            'application/json',
            'text/csv'
        )
        ->summary()
        ->saveTo('/tmp/summary.csv')
        ->get();
    }

    /**
     * @test
     */
    public function can_get_summary_by_date()
    {
        $this->mockClientForCommand(
            "summary?date_from=2015-01-01T00%3A00%3A00&date_to=2015-05-01T00%3A00%3A00"
        )
        ->summary()
        ->from('2015-01-01T00:00:00')
        ->to('2015-05-01T00:00:00')
        ->get();
    }

    /**
     * @test
     */
    public function can_get_summary_by_granularity_day()
    {
        $this->mockClientForCommand("summary?granularity=date")
        ->summary()
        ->byDay()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_summary_by_granularity_month()
    {
        $this->mockClientForCommand("summary?granularity=month")
        ->summary()
        ->byMonth()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_summary_by_granularity_week()
    {
        $this->mockClientForCommand("summary?granularity=week")
        ->summary()
        ->byWeek()
        ->get();
    }
}
