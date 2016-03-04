<?php
/**
 * Credit Card command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * Credit Card command tests.
 */
class CreditCardsTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_delete_credit_card()
    {
        $this->mockClientForCommand("credit_cards/44")
        ->creditCards()
        ->id(44)
        ->delete();
    }

    /**
     * @test
     */
    public function can_get_credit_cards()
    {
        $this->mockClientForCommand("credit_cards")
        ->creditCards()
        ->get();
    }

    /**
     * @test
     */
    public function can_create_credit_cards()
    {
        $this->mockClientForCommand("credit_cards", array(
            "first_name" => "John",
            "last_name" => "Doe",
            "address" => "1234 NW 12TH STREET",
            "city" => "Miami",
            "state" => "FL",
            "zip" => "339943",
            "country" => "US",
            "card_number" => "400000000000011",
            "card_expiration_date" => "2015-12",
            "card_code" => "432"
        ))
        ->creditCards()
        ->nameOnCard("John", "Doe")
        ->address("1234 NW 12TH STREET", "Miami", "FL", "339943", "US")
        ->cardInfo("400000000000011", "2015-12", "432")
        ->post();
    }
}
