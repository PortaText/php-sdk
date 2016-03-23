<?php
/**
 * SMS Services command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * SMS Services command tests.
 */
class SmsServicesTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_export_all_subscribers_to_csv()
    {
        $this->mockClientForCommand(
            "sms_services/55/subscribers", '', 'application/json', 'text/csv'
        )
        ->services()
        ->id(55)
        ->saveTo("/tmp/variables.csv")
        ->get();
    }

    /**
     * @test
     */
    public function can_paginate_subscribers()
    {
        $this->mockClientForCommand("sms_services/55/subscribers?page=44")
        ->services()
        ->id(55)
        ->page(44)
        ->get();
    }

    /**
     * @test
     */
    public function can_get_all_services()
    {
        $this->mockClientForCommand("sms_services")
        ->services()
        ->get();
    }

    /**
     * @test
     */
    public function can_get_one_service()
    {
        $this->mockClientForCommand("sms_services/55")
        ->services()
        ->id(55)
        ->get();
    }
}
