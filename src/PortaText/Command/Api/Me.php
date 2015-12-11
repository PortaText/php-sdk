<?php
/**
 * The Me endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_me Me endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Me endpoint.
 */
class Me extends Base
{
    /**
     * Set firstname.
     *
     * @param string $firstname The firstname.
     *
     * @return PortaText\Command\ICommand
     */
    public function firstname($firstname)
    {
        return $this->setArgument('first_name', $firstname);
    }

    /**
     * Set lastname.
     *
     * @param string $lastname The lastname.
     *
     * @return PortaText\Command\ICommand
     */
    public function lastname($lastname)
    {
        return $this->setArgument('last_name', $lastname);
    }

    /**
     * Set company.
     *
     * @param string $company The company.
     *
     * @return PortaText\Command\ICommand
     */
    public function company($company)
    {
        return $this->setArgument('company', $company);
    }

    /**
     * Set email.
     *
     * @param email $email The email.
     *
     * @return PortaText\Command\ICommand
     */
    public function email($email)
    {
        return $this->setArgument('email', $email);

    }

    /**
     * Set the callback url.
     *
     * @param string $callbackUrl The callback url.
     *
     * @return PortaText\Command\ICommand
     */
    public function callbackUrl($callbackUrl)
    {
        return $this->setArgument('callback_url', $callbackUrl);
    }

    /**
     * Set timezone.
     *
     * @param string $timezone The timezone.
     *
     * @return PortaText\Command\ICommand
     */
    public function timezone($timezone)
    {
        return $this->setArgument('timezone', $timezone);
    }

    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    public function endpoint($method)
    {
        return "me";
    }
}
