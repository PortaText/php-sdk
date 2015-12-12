<?php
/**
 * The EmailVerify endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_email_verify EmailVerify endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The EmailVerify endpoint.
 */
class EmailVerify extends Base
{
    /**
     * Use this nonce to verify.
     *
     * @param string $nonce The nonce to verify the email.
     *
     * @return PortaText\Command\ICommand
     */
    public function withNonce($nonce)
    {
        return $this->setArgument("nonce", $nonce);
    }

    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function getEndpoint($method)
    {
        $endpoint = "me/email_verify";
        $nonce = $this->getArgument("nonce");
        if (!is_null($nonce)) {
            $endpoint .= "/$nonce";
            $this->delArgument("nonce");
        }
        return $endpoint;
    }
}
