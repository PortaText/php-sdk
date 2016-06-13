<?php
/**
 * The me/settings endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_settings Settings endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The me/settings endpoint.
 * @SuppressWarnings("TooManyPublicMethods")
 */
class Settings extends Base
{
    /**
     * Dont send an alert by email on low credit.
     *
     * @return PortaText\Command\ICommand
     */
    public function dontAlertOnLowCredit()
    {
        return $this->setArgument("alert_when_credit_less_than", null);
    }

    /**
     * Sends an alert by email when credit reaches the given threshold.
     *
     * @param integer $value Credit threshold.
     *
     * @return PortaText\Command\ICommand
     */
    public function alertWhenCreditLessThan($value)
    {
        return $this->setArgument("alert_when_credit_less_than", $value);
    }

    /**
     * Don't send emails on inbound messages.
     *
     * @return PortaText\Command\ICommand
     */
    public function dontSendInboundByEmail()
    {
        return $this->setArgument("email_on_inbound_sms", null);
    }

    /**
     * Set email where to send inbound messages to.
     *
     * @param string $email Use this email to send inbound messages.
     *
     * @return PortaText\Command\ICommand
     */
    public function sendInboundByEmail($email)
    {
        return $this->setArgument("email_on_inbound_sms", $email);
    }

    /**
     * Enables auto recharges.
     *
     * @param integer $whenCredit Autorecharge when credit reaches this amount.
     * @param float $total Total money to autorecharge.
     *
     * @return PortaText\Command\ICommand
     */
    public function enableAutoRecharges($whenCredit, $total)
    {
        $this->setArgument("autorecharge_enabled", true);
        $this->setArgument("autorecharge_total", $total);
        return $this->setArgument("autorecharge_when_credit", $whenCredit);
    }

    /**
     * Disables auto recharges.
     *
     * @return PortaText\Command\ICommand
     */
    public function disableAutoRecharges()
    {
        return $this->setArgument("autorecharge_enabled", false);
    }

    /**
     * Sets default credit card id.
     *
     * @param integer $cardId Credit Card ID to use by default.
     *
     * @return PortaText\Command\ICommand
     */
    public function defaultCreditCard($cardId)
    {
        return $this->setArgument("default_card_id", $cardId);
    }

    /**
     * The minimum duration of Voice considered to be a word (milliseconds).
     *
     * @param integer $maxWordLength Value in milliseconds.
     *
     * @return PortaText\Command\ICommand
     */
    public function amdMaxWordLength($maxWordLength)
    {
        return $this->setArgument("amd_max_word_length", $maxWordLength);
    }

    /**
     * How long do we consider silence (milliseconds).
     *
     * @param integer $silenceThreshold Value in milliseconds.
     *
     * @return PortaText\Command\ICommand
     */
    public function amdSilenceThreshold($silenceThreshold)
    {
        return $this->setArgument("amd_silence_threshold", $silenceThreshold);
    }

    /**
     * Hhe maximum number of words in a greeting.
     *
     * @param integer $maxWords Number of words.
     *
     * @return PortaText\Command\ICommand
     */
    public function amdMaxWords($maxWords)
    {
        return $this->setArgument("amd_max_words", $maxWords);
    }

    /**
     * The minimum duration of silence after a word to consider the
     * audio that follows to be a new word (milliseconds).
     *
     * @param integer $silenceBetweenWords Value in milliseconds.
     *
     * @return PortaText\Command\ICommand
     */
    public function amdBetweenWordsSilence($silenceBetweenWords)
    {
        return $this->setArgument(
            "amd_between_words_silence",
            $silenceBetweenWords
        );
    }

    /**
     * The minimum duration of Voice considered to be a word (milliseconds).
     *
     * @param integer $minWordLength
     *
     * @return PortaText\Command\ICommand
     */
    public function amdMinWordLength($minWordLength)
    {
        return $this->setArgument("amd_min_word_length", $minWordLength);
    }

    /**
     * The maximum time allowed for the algorithm (milliseconds).
     *
     * @param integer $totalTime Value in milliseconds.
     *
     * @return PortaText\Command\ICommand
     */
    public function amdTotalTime($totalTime)
    {
        return $this->setArgument("amd_total_time", $totalTime);
    }

    /**
     * Is the silence after detecting a greeting (milliseconds).
     *
     * @param integer $greetingSilence Value in milliseconds.
     *
     * @return PortaText\Command\ICommand
     */
    public function amdAfterGreetingSilence($greetingSilence)
    {
        return $this->setArgument(
            "amd_after_greeting_silence",
            $greetingSilence
        );
    }

    /**
     * Is the maximum length of a greeting (milliseconds).
     *
     * @param integer $greetingLength Value in milliseconds.
     *
     * @return PortaText\Command\ICommand
     */
    public function amdMaxGreetingLength($greetingLength)
    {
        return $this->setArgument("amd_max_greeting_length", $greetingLength);
    }

    /**
     * Is maximum initial silence duration before greeting (milliseconds).
     *
     * @param integer $initialSilence Value in milliseconds.
     *
     * @return PortaText\Command\ICommand
     */
    public function amdInitialSilence($initialSilence)
    {
        return $this->setArgument("amd_initial_silence", $initialSilence);
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
        return "me/settings";
    }
}
