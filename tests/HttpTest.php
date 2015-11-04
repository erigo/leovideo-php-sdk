<?php
namespace Hoge;

use Hoge\Http\Client;

class HttpTest extends \PHPUnit_Framework_TestCase {

    public function testGet()
    {
        $response = Client::get('baidu.com');
        $this->assertEquals($response->statusCode, 200);
        $this->assertNotNull($response->body);
    }

    public function testPost()
    {
        $response = Client::post('baidu.com', NULL);

        $this->assertEquals($response->statusCode, 405);
        $this->assertNotNull($response->body);
    }

}