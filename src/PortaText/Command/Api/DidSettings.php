<?php
/**
 * The dids/:did endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_did_settings Did Settings endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The dids/:did endpoint.
 */
class DidSettings extends Base
{
    /**
     * Selects DID.
     *
     * @param string $number The DID to apply the settings to.
     *
     * @return PortaText\Command\ICommand
     */
    public function forNumber($number)
    {
        return $this->setArgument("id", $number);
    }

    /**
     * Enables CNAM lookup.
     *
     * @return PortaText\Command\ICommand
     */
    public function enableCnam()
    {
        return $this->setArgument("cnam_enabled", true);
    }

    /**
     * Enables autodetection of stop words.
     *
     * @return PortaText\Command\ICommand
     */
    public function enableStopWords()
    {
        return $this->setArgument("stop_words_enabled", true);
    }

    /**
     * Disables autodetection of stop words.
     *
     * @return PortaText\Command\ICommand
     */
    public function disableStopWords()
    {
        return $this->setArgument("stop_words_enabled", false);
    }

    /**
     * Disables CNAM lookup.
     *
     * @return PortaText\Command\ICommand
     */
    public function disableCnam()
    {
        return $this->setArgument("cnam_enabled", false);
    }

    /**
     * Disables autoresponder.
     *
     * @return PortaText\Command\ICommand
     */
    public function dontAutoRespond()
    {
        return $this->setArgument("autoresponder_enabled", false);
    }

    /**
     * Enables autoresponder.
     *
     * @param string $text Autoresponder text.
     *
     * @return PortaText\Command\ICommand
     */
    public function autoRespondWith($text)
    {
        $this->setArgument("autoresponder_text", $text);
        return $this->setArgument("autoresponder_enabled", true);
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
        $number = $this->getArgument("id");
        if (!is_null($number)) {
            $this->delArgument("id");
            return "dids/$number";
        }
        return "dids";
    }
}
