<?php
namespace Hoge\Http;

class Request {

    public $url;
    public $headers;
    public $body;
    public $method;

    public function __construct($method, $url, array $headers = array(), $body = NULL)
    {
        $this->method = strtoupper($method);
        $this->url    = $url;
        $this->headers = $headers;
        $this->body   = $body;
    }
}