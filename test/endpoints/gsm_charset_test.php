<?php
/**
 * GsmCharset command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * GsmCharset command tests.
 */
class GsmCharsetTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_get_charset()
    {
        $this->mockClientForCommand('gsm_charset')
        ->gsmCharset()
        ->get();
    }
}
