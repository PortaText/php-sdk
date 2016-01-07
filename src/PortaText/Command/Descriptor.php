<?php
/**
 * A command executor descriptor.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Command;

/**
 * A command factory implementation.
 */
class Descriptor
{
    /**
     * The full complete URI for the request.
     *
     * @var string
     */
    public $uri;

    /**
     * The HTTP method.
     *
     * @var string
     */
    public $method;

    /**
     * The HTTP headers.
     *
     * @var string
     */
    public $headers;

    /**
     * The body of the request.
     *
     * @var string
     */
    public $body;

    /**
     * File where to write result to.
     *
     * @var string
     */
    public $outputFile;

    /**
     * Constructor.
     *
     * @param string $uri The full complete URI for the request.
     * @param string $method The HTTP method.
     * @param array $headers The HTTP headers.
     * @param string $body The body of the request.
     * @param string $outputFile File where to write result to.
     */
    public function __construct(
        $uri,
        $method,
        $headers,
        $body,
        $outputFile = null
    ) {
        $this->uri = $uri;
        $this->method = $method;
        $this->headers = $headers;
        $this->body = $body;
        $this->outputFile = $outputFile;
    }
}
