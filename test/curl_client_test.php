<?php
/**
 * CURL implementation tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Curl as Client;
use PortaText\Command\Descriptor as Descriptor;

/**
 * CURL implementation tests.
 */
class CurlClient extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function cannot_request_invalid_file()
    {
        $descriptor = new Descriptor(
            "http://1.2.3.4",
            "delete",
            array(),
            "file:/tmp/a/b/c/d/e/f"
        );
        $portatext = new Client();
        $portatext->execute($descriptor);
    }

    /**
     * @test
     */
    public function can_save_to_file()
    {
        $address = "127.0.0.1";
        $port = 10452;
        $acceptFileFlag = tempnam("/tmp", "accept$port");
        $writeFileFlag = tempnam("/tmp", "write$port");
        $receivedFileFlag = tempnam("/tmp", "write$port");
        $targetFile = tempnam("/tmp", "target$port");
        switch($pid = pcntl_fork()) {
            case -1:
                throw new \Exception("Could not fork");
            case 0:
                $serverSock = $this->openServer($address, $port);
                touch($acceptFileFlag);
                $clientSock = @socket_accept($serverSock);
                $buffer = '';
                while(!strstr($buffer, "body")) {
                    $newBuff = '';
                    @socket_recv($clientSock, $newBuff, 2048, \MSG_DONTWAIT);
                    $buffer .= $newBuff;
                }
                $result = implode("\r\n", array(
                    "HTTP/1.1 742 OK",
                    "Connection: close",
                    "X-header1: value1",
                    "X-header2: value2",
                    "Content-Type: text/csv",
                    "",
                    "line1\nline2\n"
                ));
                @socket_write($clientSock, $result);
                $this->waitForFile($receivedFileFlag);
                @socket_close($clientSock);
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
                    "this is a body",
                    $targetFile
                );
                $portatext = new Client();
                $this->waitForFile($acceptFileFlag);
                usleep(100000);
                list($code, $headers, $body) = $portatext->execute($descriptor);
                touch($receivedFileFlag);
                $this->waitForFile($writeFileFlag);
                $contents = $this->assertEquals(
                    "line1\nline2\n",
                    file_get_contents($targetFile)
                );
                @unlink($acceptFileFlag);
                @unlink($receivedFileFlag);
                @unlink($writeFileFlag);
                @unlink($targetFile);
                break;
        }
    }

    /**
     * @test
     */
    public function can_request_with_file()
    {
        $address = "127.0.0.1";
        $port = 10451;
        $acceptFileFlag = tempnam("/tmp", "accept$port");
        $readFileFlag = tempnam("/tmp", "read$port");
        $writeFileFlag = tempnam("/tmp", "write$port");
        $receivedFileFlag = tempnam("/tmp", "write$port");
        $dataFile = tempnam("/tmp", "data$port");
        file_put_contents($dataFile, "upload this one");

        switch($pid = pcntl_fork()) {
            case -1:
                throw new \Exception("Could not fork");
            case 0:
                $serverSock = $this->openServer($address, $port);
                touch($acceptFileFlag);
                $clientSock = @socket_accept($serverSock);
                $buffer = '';
                while(!strstr($buffer, "this one")) {
                    $newBuff = '';
                    @socket_recv($clientSock, $newBuff, 2048, \MSG_DONTWAIT);
                    $buffer .= $newBuff;
                }
                file_put_contents($readFileFlag, $buffer);
                $result = implode("\r\n", array(
                    "HTTP/1.1 742 OK",
                    "Connection: close",
                    "X-header1: value1",
                    "X-header2: value2",
                    "",
                    "{\"success\": \"true\"}"
                ));
                @socket_write($clientSock, $result);
                $this->waitForFile($receivedFileFlag);
                @socket_close($clientSock);
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
                    "file:$dataFile"
                );
                $portatext = new Client();
                $this->waitForFile($acceptFileFlag);
                usleep(100000);
                list($code, $headers, $body) = $portatext->execute($descriptor);
                touch($receivedFileFlag);

                $this->waitForFile($writeFileFlag);

                $this->assertEquals($code, 742);
                $this->assertEquals($headers, array(
                    "connection" => "close",
                    "x-header1" => "value1",
                    "x-header2" => "value2"
                ));
                $this->assertEquals($body, "{\"success\": \"true\"}");

                $contents = explode("\r\n", file_get_contents($readFileFlag));
                @unlink($acceptFileFlag);
                @unlink($readFileFlag);
                @unlink($receivedFileFlag);
                @unlink($writeFileFlag);
                @unlink($dataFile);
                $this->assertTrue(
                    count(
                        array_diff(
                            array(
                                "DELETE / HTTP/1.1",
                                "User-Agent: PortaText PHP SDK",
                                "X-Request-header1: value1",
                                "X-Request-header2: value2",
                                "upload this one"
                            ),
                            $contents
                        )
                    ) === 0
                );
                break;
        }
    }

    /**
     * @test
     */
    public function can_request()
    {
        $address = "127.0.0.1";
        $port = 10450;
        $acceptFileFlag = tempnam("/tmp", "accept$port");
        $readFileFlag = tempnam("/tmp", "read$port");
        $writeFileFlag = tempnam("/tmp", "write$port");
        $receivedFileFlag = tempnam("/tmp", "write$port");
        switch($pid = pcntl_fork()) {
            case -1:
                throw new \Exception("Could not fork");
            case 0:
                $serverSock = $this->openServer($address, $port);
                touch($acceptFileFlag);
                $clientSock = @socket_accept($serverSock);
                $buffer = '';
                while(!strstr($buffer, "body")) {
                    $newBuff = '';
                    @socket_recv($clientSock, $newBuff, 2048, \MSG_DONTWAIT);
                    $buffer .= $newBuff;
                }
                file_put_contents($readFileFlag, $buffer);
                $result = implode("\r\n", array(
                    "HTTP/1.1 742 OK",
                    "Connection: close",
                    "X-header1: value1",
                    "X-header2: value2",
                    "",
                    "{\"success\": \"true\"}"
                ));
                @socket_write($clientSock, $result);
                $this->waitForFile($receivedFileFlag);
                @socket_close($clientSock);
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
                $this->waitForFile($acceptFileFlag);
                usleep(100000);
                list($code, $headers, $body) = $portatext->execute($descriptor);
                touch($receivedFileFlag);

                $this->waitForFile($writeFileFlag);

                $this->assertEquals($code, 742);
                $this->assertEquals($headers, array(
                    "connection" => "close",
                    "x-header1" => "value1",
                    "x-header2" => "value2"
                ));
                $this->assertEquals($body, "{\"success\": \"true\"}");

                $contents = explode("\r\n", file_get_contents($readFileFlag));
                @unlink($acceptFileFlag);
                @unlink($readFileFlag);
                @unlink($receivedFileFlag);
                @unlink($writeFileFlag);
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
     * @test
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
        try
        {
            $portatext->execute($descriptor);
        } catch(\PortaText\Exception\RequestError $e) {
            $eDescriptor = $e->getDescriptor();
            $this->assertTrue(strlen($e->getMessage()) > 10);
            $this->assertEquals($eDescriptor->uri, $descriptor->uri);
            $this->assertEquals($eDescriptor->method, $descriptor->method);
            $this->assertEquals($eDescriptor->headers, $descriptor->headers);
            $this->assertEquals($eDescriptor->body, $descriptor->body);
            $this->assertNull($e->getResult());
        }
    }

    private function waitForFile($file)
    {
        $totalTime = 0;
        $sleepTime = 100;
        while(true) {
            usleep($sleepTime);
            if(file_exists($file)) {
                break;
            }
            $totalTime += $sleepTime;
            if ($totalTime > 5000000) {
                throw new \Exception("Timeout waiting for $file");
            }
        }
    }

    private function openServer($address, $port)
    {
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
        return $serverSock;
    }

    private function readRequest($sock)
    {
        $buffer = '';
        @socket_recv($clientSock, $buffer, 2048, \MSG_DONTWAIT);
        return $buffer;
    }
}