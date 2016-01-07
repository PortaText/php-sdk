<?php
/**
 * Client implementation using CURL.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Marcelo Gornstein <marcelog@portatext.com>
 * @copyright 2015 PortaText
 */
namespace PortaText\Client;

use PortaText\Exception\RequestError;

/**
 * All API client implementations should extend this class.
 */
class Curl extends Base
{
    /**
     * Executes the request. Will depend on the client implementation.
     * Returns an array with code, headers, and body.
     *
     * @param PortaText\Command\Descriptor $descriptor Command descriptor.
     *
     * @return array
     * @throws PortaText\Exception\RequestError
     */
    public function execute($descriptor)
    {
        $curl = @curl_init();
        $headers = array();
        foreach ($descriptor->headers as $k => $v) {
            $headers[] = "$k: $v";
        }
        $fileHandle = null;
        $fileHandleW = null;
        $headers[] = "Expect:";
        $state = "reading_status";
        $retCode = 0;
        $retHeaders = array();
        $retBody = '';

        $curlOpts = array(
            CURLOPT_URL => $descriptor->uri,
            CURLOPT_HEADER => true,
            CURLOPT_CUSTOMREQUEST => strtoupper($descriptor->method),
            CURLOPT_USERAGENT => "PortaText PHP SDK",
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => false,
            CURLOPT_SSL_VERIFYPEER => true,
            //CURLOPT_VERBOSE => true,
            CURLOPT_POSTFIELDS => $descriptor->body
        );
        if (!is_null($descriptor->outputFile)) {
            $fileHandleW = $this->openFile($descriptor->outputFile, 'w+');
        }
        if (strncmp($descriptor->body, "file:", 5) === 0) {
            $fileData = explode(":", $descriptor->body);
            $filename = $fileData[1];
            $fileHandle = $this->openFile($filename, 'r');
            unset($curlOpts[CURLOPT_POSTFIELDS]);
            $curlOpts[CURLOPT_UPLOAD] = 1;
            $curlOpts[CURLOPT_INFILESIZE] = filesize($filename);
            $curlOpts[CURLOPT_INFILE] = $fileHandle;
            $curlOpts[CURLOPT_BUFFERSIZE] = 4096;
            $curlOpts[CURLOPT_NOPROGRESS] = true;
        }
        $curlOpts[CURLOPT_WRITEFUNCTION] = function (
            $resource,
            $data
        ) use (
            &$state,
            &$retCode,
            &$retHeaders,
            &$retBody,
            $fileHandleW
        ) {
            $resource = null; // make MD happy
            $dataLen = strlen($data);
            if ($state === "reading_status") {
                $retCode = $this->parseCode($data);
                $state = "reading_headers";
                return $dataLen;
            }
            if ($state === "reading_headers") {
                if ($data === "\r\n") {
                    $state = "reading_body";
                    return $dataLen;
                }
                list($k, $v) = $this->parseHeader($data);
                $retHeaders[$k] = $v;
                return $dataLen;
            }
            if ($state === "reading_body") {
                if ($fileHandleW) {
                    return @fwrite($fileHandleW, $data);
                }
                $retBody .= $data;
                return $dataLen;
            }
        }; //@codeCoverageIgnore
        @curl_setopt_array($curl, $curlOpts);
        $result = curl_exec($curl);
        $this->closeFiles(array($fileHandleW, $fileHandle));
        $this->assertCurlResult($curl, $result, $descriptor);
        return array($retCode, $retHeaders, $retBody);
    }

    /**
     * Asserts that the curl result was successful.
     *
     * @param resource $curl The curl resource.
     * @param mixed $result The result.
     * @param PortaText\Command\Descriptor $descriptor Command descriptor.
     *
     * @return mixed
     * @throws PortaText\Exception\RequestError
     */
    private function assertCurlResult($curl, $result, $descriptor)
    {
        if ($result === false) {
            $error = curl_error($curl);
            @curl_close($curl);
            throw new RequestError($error, $descriptor);
        }
        @curl_close($curl);
        return $result;
    }
    /**
     * Parses the HTTP status line.
     *
     * @param string $data HTTP Status line.
     *
     * @return integer
     */
    private function parseCode($data)
    {
        preg_match("/HTTP\/1\.\d (\d{3})/", $data, $matches);
        return (integer)$matches[1];
    }

    /**
     * Parses an HTTP header line.
     *
     * @param string $header The HTTP header line.
     *
     * @return array
     */
    private function parseHeader($header)
    {
        list($key, $value) = explode(": ", trim($header), 2);
        return array(strtolower($key), $value);
    }

    /**
     * Opens a file and returns a file handle.
     *
     * @param string $file The filename.
     * @param string $mode The mode.
     *
     * @return resource|false
     */
    private function openFile($file, $mode)
    {
        $handle = @fopen($file, $mode);
        if ($handle === false) {
            throw new \InvalidArgumentException("Could not open $file");
        }
        return $handle;
    }

    /**
     * Closes all the file handles.
     *
     * @param array $files Array of file handles.
     *
     * @return void
     */
    private function closeFiles($files)
    {
        foreach ($files as $f) {
            if ($f) {
                @fclose($f);
            }
        }
    }
}
