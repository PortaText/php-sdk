<?php
/**
 * Dids Search command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Dids Search command tests.
 */
class DidsSearchTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_search_for_local_numbers()
    {
        $this->mockClientForCommand("dids/search?country=JP&type=local")
        ->didSearch()
        ->forCountry("JP")
        ->local()
        ->get();
    }

    /**
     * @test
     */
    public function can_search_for_mobile_numbers()
    {
        $this->mockClientForCommand("dids/search?country=JP&type=mobile")
        ->didSearch()
        ->forCountry("JP")
        ->mobile()
        ->get();
    }

    /**
     * @test
     */
    public function can_search_for_tollfree_numbers()
    {
        $this->mockClientForCommand("dids/search?country=JP&type=toll_free")
        ->didSearch()
        ->forCountry("JP")
        ->tollFree()
        ->get();
    }

    /**
     * @test
     */
    public function can_search_for_national_numbers()
    {
        $this->mockClientForCommand("dids/search?country=JP&type=national")
        ->didSearch()
        ->forCountry("JP")
        ->national()
        ->get();
    }

    /**
     * @test
     */
    public function can_search_for_numbers_starting_with()
    {
        $args = implode("&", array(
            "country=US",
            "where_pattern=starts_with",
            "pattern=305"
        ));
        $this->mockClientForCommand("dids/search?$args")
        ->didSearch()
        ->forCountry("US")
        ->startsWith("305")
        ->get();
    }

    /**
     * @test
     */
    public function can_search_for_numbers_ending_with()
    {
        $args = implode("&", array(
            "country=US",
            "where_pattern=ends_with",
            "pattern=999"
        ));
        $this->mockClientForCommand("dids/search?$args")
        ->didSearch()
        ->forCountry("US")
        ->endsWith("999")
        ->get();
    }

    /**
     * @test
     */
    public function can_search_for_numbers_containing_pattern()
    {
        $args = implode("&", array(
            "country=US",
            "where_pattern=anywhere",
            "pattern=444"
        ));
        $this->mockClientForCommand("dids/search?$args")
        ->didSearch()
        ->forCountry("US")
        ->contains("444")
        ->get();
    }

    /**
     * @test
     */
    public function can_paginate_search()
    {
        $args = implode("&", array(
            "country=US",
            "page=3"
        ));
        $this->mockClientForCommand("dids/search?$args")
        ->didSearch()
        ->forCountry("US")
        ->page(3)
        ->get();
    }
}
