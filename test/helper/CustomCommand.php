<?php
/**
 * A custom command to be used in tests.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command\Api;

use PortaText\Command\Base;

/**
 * A custom command to be used in tests.
 */
class CustomCommand extends Base
{
    public function anArgument($value)
    {
        return $this->setArgument('argument1', $value);
    }

    public function endpoint($method)
    {
        return "customCommandEndpoint";
    }
}
