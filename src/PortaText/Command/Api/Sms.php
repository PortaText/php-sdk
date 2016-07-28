<?php
/**
 * The SMS endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_sms SMS endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The SMS endpoint.
 */
class Sms extends Base
{
    /**
     * Sets the sms operation id.
     *
     * @param string $smsId SMS operation id.
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
     */
    public function id($smsId)
    {
        return $this->setArgument("id", $smsId);
    }

    /**
     * Sets the message destination number.
     *
     * @param string $target Phone number to send message to.
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
     */
    public function to($target)
    {
        return $this->setArgument("to", $target);
    }

    /**
     * Sets the message source number.
     *
     * @param string $number Phone number to send message from.
     *
     * @return PortaText\Command\ICommand
     */
    public function from($number)
    {
        return $this->setArgument("from", $number);
    }

    /**
     * Specifies source sms service.
     *
     * @param string $serviceId SMS Service ID.
     *
     * @return PortaText\Command\ICommand
     */
    public function fromService($serviceId)
    {
        return $this->setArgument("service_id", $serviceId);
    }

    /**
     * Sets the template id to use.
     *
     * @param integer $templateId Use the given template as the message body.
     * @param array $variables Variables to use in template.
     *
     * @return PortaText\Command\ICommand
     */
    public function useTemplate($templateId, array $variables = array())
    {
        $this->setArgument("template_id", $templateId);
        return $this->setArgument("variables", $variables);
    }

    /**
     * Sets the message text.
     *
     * @param string $text Message text.
     *
     * @return PortaText\Command\ICommand
     */
    public function text($text)
    {
        return $this->setArgument("text", $text);
    }

    /**
     * Set a specific custom client reference.
     *
     * @param string $clientRef Your custom reference.
     *
     * @return PortaText\Command\ICommand
     */
    public function clientRef($clientRef)
    {
        return $this->setArgument("client_ref", $clientRef);
    }

    /**
     * Contact list IDs to use.
     *
     * @param array $contactLists The contact list ids.
     *
     * @return PortaText\Command\ICommand
     */
    public function toContactLists(array $contactLists)
    {
        return $this->setArgument("contact_list_ids", $contactLists);
    }

    /**
     * Searches for SMS operations.
     *
     * @param array $params Search params (see the API doc).
     *
     * @return PortaText\Command\ICommand
     */
    public function search(array $params)
    {
        return $this->setArgument("search_params", $params);
    }

    /**
     * Schedule this message
     *
     * @param integer $type Schedule type.
     * @param array $details Schedule configuration.
     *
     * @return PortaText\Command\ICommand
     * @see https://github.com/PortaText/docs/wiki/REST-API#schedules
     */
    public function schedule($type, $details)
    {
        $schedule = array();
        $schedule[$type] = $details;
        return $this->setArgument("schedule", $schedule);
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
        $endpoint = "sms";
        $searchParams = $this->getArgument("search_params");
        if (!is_null($searchParams)) {
            $queryString = http_build_query($searchParams);
            $this->delArgument("search_params");
            return "$endpoint?$queryString";
        }
        $operationId = $this->getArgument("id");
        if (!is_null($operationId)) {
            $endpoint .= "/$operationId";
            $this->delArgument("id");
        }
        return $endpoint;
    }
}
