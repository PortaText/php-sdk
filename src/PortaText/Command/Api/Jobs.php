<?php
/**
 * The Jobs endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_jobs Jobs endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Jobs endpoint.
 */
class Jobs extends Base
{
    /**
     * Sets the job id.
     *
     * @param integer $jobId The job id.
     *
     * @return PortaText\Command\ICommand
     * @SuppressWarnings("ShortMethodName")
     */
    public function id($jobId)
    {
        return $this->setArgument("id", $jobId);
    }

    /**
     * Return the specific page of results.
     *
     * @param integer $page Page number.
     *
     * @return PortaText\Command\ICommand
     */
    public function page($page)
    {
        return $this->setArgument("page", $page);
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
        $endpoint = "jobs";
        $jobId = $this->getArgument("id");
        if (!is_null($jobId)) {
            $endpoint .= "/$jobId";
            $this->delArgument("id");
        }
        $page = $this->getArgument("page");
        $this->delArgument("page");
        if (!is_null($page)) {
            $endpoint .= "?page=$page";
        }
        return $endpoint;
    }
}
