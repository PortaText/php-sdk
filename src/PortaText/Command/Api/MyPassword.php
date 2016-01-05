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
        return "me/password";
    }
}
