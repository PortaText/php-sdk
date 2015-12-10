<?php
/**
 * Thrown on 429 error.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Exception;

/**
 * Thrown on 429 error.
 */
class RateLimited extends ClientError
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct("You've been rate limited, try again later");
    }
}
