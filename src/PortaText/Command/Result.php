<?php
/**
 * All executed commands returns an instance of this class.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command;

/**
 * All executed commands returns an instance of this class.
 */
class Result
{
    /**
     * Returned data.
     *
     * @var array
     */
    public $data;

    /**
     * Returned headers.
     *
     * @var array
     */
    public $headers;

    /**
     * Whether the request was successful or not.
     *
     * @var boolean
     */
    public $success;

    /**
     * HTTP status code
     *
     * @var integer
     */
    public $code;

    /**
     * Class constructor.
     *
     * @param integer $code HTTP status code.
     * @param array $headers HTTP headers as an associative array.
     * @param array $data Returned data as an associative array.
     */
    public function __construct($code, $headers, $data)
    {
        $this->code = $code;
        $this->success = ($code > 199 && $code < 300) && $data["success"];
        $this->headers = $headers;
        $this->data = $data;
    }
}
