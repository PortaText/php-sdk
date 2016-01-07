<?php
/**
 * Authentication tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Test;

use PortaText\Client\Base as Client;
use PortaText\Command\Descriptor as Descriptor;

/**
 * Authentication tests.
 */
class AuthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function can_use_api_key()
    {
        $client = $this
            ->getMockBuilder('PortaText\Client\Base')
            ->setMethods(array('execute'))
            ->getMock();
        $client
            ->expects($this->once())
            ->method('execute')
            ->with($this->callback(function($descriptor) {
                return
                    count(array_diff($descriptor->headers, array(
                        "X-Api-Key" => "anapikey"
                    )) === 0);
            }))
            ->will($this->returnValue(array(200, array(), "")));
        $client
            ->setApiKey("anapikey")
            ->run(
                "endpoint/subpath",
                "amethod",
                "content type",
                "accept content type",
                "a body"
            );
    }

    /**
     * @test
     * @expectedException PortaText\Exception\InvalidCredentials
     */
    public function cannot_use_invalid_credentials()
    {
        $client = $this
            ->getMockBuilder('PortaText\Client\Base')
            ->setMethods(array('execute'))
            ->getMock();
        $client
            ->expects($this->once())
            ->method('execute')
            ->with($this->callback(function($descriptor) {
                $auth = $descriptor->headers["Authorization"];
                list($authType, $credentials) = explode(" ", $auth);
                list($user, $pass) = explode(":", base64_decode($credentials));
                return
                    $authType === "Basic" &&
                    $user === "user" &&
                    $pass === "password";
            }))
            ->will($this->returnValue(array(401, array(), "")));
        $client
            ->setCredentials("user", "password")
            ->run(
                "endpoint",
                "amethod",
                "content type",
                "accept content type",
                "a body",
                "basic"
            );
    }

    /**
     * @test
     */
    public function can_use_credentials()
    {
        $client = $this
            ->getMockBuilder('PortaText\Client\Base')
            ->setMethods(array('execute'))
            ->getMock();
        $client
            ->expects($this->exactly(3))
            ->method('execute')
            ->withConsecutive(
                /*
                 * On the first call, no session token was issued, so the client
                 * should login first and then reissue the call using the
                 * obtained session token.
                 */
                array(
                    $this->callback(function($descriptor) {
                        $auth = $descriptor->headers["Authorization"];
                        list($authType, $credentials) = explode(" ", $auth);
                        list($user, $pass) = explode(
                            ":",
                            base64_decode($credentials)
                        );
                        return
                            $authType === "Basic" &&
                            $user === "user" &&
                            $pass === "password";
                    })
                ),
                array(
                    $this->callback(function($descriptor) {
                        $uri = Client::$defaultEndpoint . "/endpoint";
                        $token = $descriptor->headers["X-Session-Token"];
                        return
                            $descriptor->uri === $uri &&
                            $token === "sessiontoken";
                    })
                ),
                /*
                 * On the next calls, we have a session token already, so no
                 * login is necessary.
                 */
                array(
                    $this->callback(function($descriptor) {
                        $uri = Client::$defaultEndpoint . "/endpoint";
                        $token = $descriptor->headers["X-Session-Token"];
                        return
                            $descriptor->uri === $uri &&
                            $token === "sessiontoken";
                    })
                )
            )->will($this->onConsecutiveCalls(
                array(
                    200, array(), '{"success": true, "token": "sessiontoken"}'
                ),
                array(200, array(), '{"success": true}'),
                array(200, array(), '{"success": true}')
            ));
        $client
            ->setCredentials("user", "password")
            ->run(
                "endpoint",
                "amethod",
                "content type",
                "accept content type",
                "a body"
            );
        $client->run(
            "endpoint",
            "amethod",
            "content type",
            "accept content type",
            "a body"
        );
    }

    /**
     * @test
     */
    public function can_renew_session_token()
    {
        $client = $this
            ->getMockBuilder('PortaText\Client\Base')
            ->setMethods(array('execute'))
            ->getMock();
        $client
            ->expects($this->exactly(4))
            ->method('execute')
            ->withConsecutive(
                /**
                 * This will simulate that no session token exists, one is
                 * requested by issuing a login, that new token is now expired
                 * (401) so a new login is required and finally that last call
                 * works.
                 */
                array(
                    $this->callback(function($descriptor) {
                        $uri = Client::$defaultEndpoint . "/login";
                        return $descriptor->uri === $uri;
                    })
                ),
                /*
                 * When the session token expires, we get a 401, so a login
                 * is needed and then we have to reissue the call from the top.
                 */
                array(
                    $this->callback(function($descriptor) {
                        $uri = Client::$defaultEndpoint . "/endpoint";
                        return $descriptor->uri === $uri;
                    })
                ),
                array(
                    $this->callback(function($descriptor) {
                        $uri = Client::$defaultEndpoint . "/login";
                        return $descriptor->uri === $uri;
                    })
                ),
                array(
                    $this->callback(function($descriptor) {
                        $uri = Client::$defaultEndpoint . "/endpoint";
                        $token = $descriptor->headers["X-Session-Token"];
                        return
                            $descriptor->uri === $uri &&
                            $token === "tokensession";
                    })
                )
            )
            ->will($this->onConsecutiveCalls(
                array(
                    200, array(), '{"success": true, "token": "sessiontoken"}'
                ),
                array(401, array(), '{"success": true}'),
                array(
                    200, array(), '{"success": true, "token": "tokensession"}'
                ),
                array(200, array(), '{"success": true}')
            ));
        $client
            ->setCredentials("user", "password")
            ->run(
                "endpoint",
                "amethod",
                "content type",
                "accept content type",
                "a body"
            );
    }
}
