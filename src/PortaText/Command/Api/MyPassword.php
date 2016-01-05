<?php
/**
 * The Me/Password endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_me_password Me/Password endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Me/Password endpoint.
 */
class MyPassword extends Base
{
    /**
     * Use this nonce to reset password.
     *
     * @param string $nonce The nonce to use to reset the password.
     * @param string $newPassword The new password to set.
     *
     * @return PortaText\Command\ICommand
     */
    public function withNonce($nonce, $newPassword)
    {
        $this->setArgument('new_password', $newPassword);
        return $this->setArgument('nonce', $nonce);
    }

    /**
     * Asks to reset the password.
     *
     * @return PortaText\Command\ICommand
     */
    public function reset()
    {
        return $this->setArgument('reset', true);
    }

    /**
     * Asks to reset the password.
     *
     * @param string $email Reset the password for this email.
     *
     * @return PortaText\Command\ICommand
     */
    public function forEmail($email)
    {
        return $this->setArgument('email', $email);
    }


    /**
     * Set Name.
     *
     * @param string $oldPassword The current password.
     * @param string $newPassword The new password.
     *
     * @return PortaText\Command\ICommand
     */
    public function change($oldPassword, $newPassword)
    {
        $this->setArgument('old_password', $oldPassword);
        return $this->setArgument('new_password', $newPassword);
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
        $endpoint = 'me/password';
        $reset = $this->getArgument('reset');
        $nonce = $this->getArgument('nonce');
        if (!is_null($reset)) {
            $endpoint .= '/reset';
            $this->delArgument('reset');
        }
        if (!is_null($nonce)) {
            $endpoint .= "/$nonce";
            $this->delArgument('nonce');
        }
        return $endpoint;
    }
}
