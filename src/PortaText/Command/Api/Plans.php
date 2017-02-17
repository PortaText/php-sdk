<?php
/**
 * The Plans endpoint.
 *
 * @link https://github.com/PortaText/docs/wiki/REST-API#api_plans Plans endpoint.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Laura Corvalan <laura@portatext.com>
 * @copyright 2015- PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * The Plans endpoint.
 */
class Plans extends Base
{
    /**
     * Returns a string with the endpoint for the given command.
     *
     * @param string $method Method for this command.
     *
     * @return string
     */
    protected function getEndpoint($method)
    {
        return 'plans';
    }
}
