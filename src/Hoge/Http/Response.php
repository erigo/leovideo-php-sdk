<?php
namespace Hoge\Http;

class Response {

    public $statusCode;
    public $headers;
    public $body;

    public function __construct($code, array $headers = array(), $body = NULL)
    {
        $this->statusCode = $code;
        $this->headers = $headers;
        $this->body = $body;
    }
}