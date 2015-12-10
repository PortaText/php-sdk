<?php
namespace PortaText\Test;

use PortaText\Client\Curl as Client;
use PortaText\Command\Descriptor as Descriptor;

class CurlClient extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function can_request()
    {
        $address = "127.0.0.1";
        $port = 10450;
        $acceptFileFlag = tempnam("/tmp", "accept" . __CLASS__);
        $readFileFlag = tempnam("/tmp", "read" . __CLASS__);
        $writeFileFlag = tempnam("/tmp", "write" . __CLASS__);
        switch($pid = pcntl_fork()) {
            case -1:
                throw new \Exception("Could not fork");
            case 0:
                $serverSock = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
                if ($serverSock === false) {
                    $error = socket_last_error();
                    throw new \Exception("socket_create: $error");
                }
                @socket_set_option($serverSock, SOL_SOCKET, SO_REUSEADDR, 1);

                if (@socket_bind($serverSock, $address, $port) === false) {
                    $error = socket_strerror(socket_last_error($serverSock));
                    throw new \Exception("socket_bind: $error");
                }
                if (@socket_listen($serverSock, 5) === false) {
                    $error = socket_strerror(socket_last_error($serverSock));
                    throw new \Exception("socket_listen: $error");
                }

                touch($acceptFileFlag);
                $clientSock = @socket_accept($serverSock);
                $buffer = '';
                @socket_recv($clientSock, $buffer, 2048, \MSG_DONTWAIT);
                file_put_contents($readFileFlag, $buffer);
                $result = implode("\r\n", array(
                    "HTTP/1.1 742 OK",
                    "X-header1: value1",
                    "X-header2: value2",
                    "",
                    "{\"success\": \"true\"}"
                ));
                @socket_write($clientSock, $result);
                @socket_close($serverSock);
                file_put_contents($writeFileFlag, $result);
                exit(0);
                break;
            default:
                $descriptor = new Descriptor(
                    "http://$address:$port",
                    "delete",
                    array(
                        "X-Request-header1" => "value1",
                        "X-Request-header2" => "value2"
                    ),
                    "this is a body"
                );
                $portatext = new Client();
                while(true) {
                    usleep(100000);
                    if(file_exists($acceptFileFlag)) {
                        break;
                    }
                }
                list($code, $headers, $body) = $portatext->execute($descriptor);
                while(true) {
                    usleep(100000);
                    if(file_exists($writeFileFlag)) {
                        break;
                    }
                }

                $this->assertEquals($code, 742);
                $this->assertEquals($headers, array(
                    "x-header1" => "value1",
                    "x-header2" => "value2"
                ));
                $this->assertEquals($body, "{\"success\": \"true\"}");

                $contents = explode("\r\n", file_get_contents($readFileFlag));
                $this->assertTrue(
                    count(
                        array_diff(
                            array(
                                "DELETE / HTTP/1.1",
                                "User-Agent: PortaText PHP SDK",
                                "X-Request-header1: value1",
                                "X-Request-header2: value2",
                                "this is a body"
                            ),
                            $contents
                        )
                    ) === 0
                );
                break;
        }
    }

    /**
     * test
     * @expectedException PortaText\Exception\RequestError
     */
    public function can_throw_request_error()
    {
        $descriptor = new Descriptor(
          "http://localhost:1",
          "delete",
          array(
            "header1" => "value1",
            "header2" => "value2"
          ),
          "this is a body"
        );
        $portatext = new Client();
        $portatext->execute($descriptor);
    }
}