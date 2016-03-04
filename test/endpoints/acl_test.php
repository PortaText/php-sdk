<?php
/**
 * ACL command tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;

/**
 * ACL command tests.
 */
class AclTest extends BaseCommandTest
{
    /**
     * @test
     */
    public function can_set_acl()
    {
        $this->mockClientForCommand("acl", array(
            "acl" => array(
                array(
                    "ip" => "192.168.0.1",
                    "netmask" => 32,
                    "description" => ""
                ),
                array(
                    "ip" => "10.10.10.10",
                    "netmask" => 24,
                    "description" => ""
                ),
                array(
                    "ip" => "172.16.0.0",
                    "netmask" => 16,
                    "description" => "A description"
                )
            )
        ))
        ->acl()
        ->add("192.168.0.1")
        ->add("10.10.10.10", 24)
        ->add("172.16.0.0", 16, "A description")
        ->put();
    }

    /**
     * @test
     */
    public function can_get_acl()
    {
        $this->mockClientForCommand("acl")
        ->acl()
        ->get();
    }
}
