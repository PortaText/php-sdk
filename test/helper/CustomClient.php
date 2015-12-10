<?php
namespace PortaText\Test;

use PortaText\Client\Base as BaseClient;

class CustomClient extends BaseClient
{
    protected $resultData = array();

    public function run(
        $endpoint = "endpoint",
        $method = "get",
        $contentType = "application/json",
        $body = "",
        $authType = null
    )
    {
        return parent::run($endpoint, $method, $contentType, $body, $authType);
    }

    public function execute($descriptor)
    {
        return $this->resultData;
    }

    public function __construct(
        $retCode = 200,
        $retHeaders = array(),
        $retBody = '{"success": true}'
    ) {
        parent::__construct();
        $this->resultData = array($retCode, $retHeaders, $retBody);
    }
}