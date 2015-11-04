<?php
namespace Hoge\Http;

use Hoge\Config;

class Client {

    public static function get($url, array $headers = array())
    {
        $request = new Request('GET', $url, $headers);

        return self::sendRequest($request);
    }

    public static function post($url, $body, array $headers = array())
    {
        $request = new Request('POST', $url, $headers, $body);

        return self::sendRequest($request);
    }

    private static function userAgent()
    {
        $sdkInfo     = "HogePHP/" . Config::SDK_VERSION;
        $systemInfo  = php_uname("s");
        $machineInfo = php_uname("m");
        $envInfo     = "($systemInfo/$machineInfo)";
        $phpVer      = phpversion();
        $ua          = "$sdkInfo $envInfo PHP/$phpVer";

        return $ua;
    }

    private static function sendRequest(Request $request)
    {
        $ch      = curl_init();
        $options = array(
            CURLOPT_USERAGENT      => self::userAgent(),
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_SSL_VERIFYHOST => FALSE,
            CURLOPT_HEADER         => TRUE,
            CURLOPT_NOBODY         => FALSE,
            CURLOPT_CUSTOMREQUEST  => $request->method,
            CURLOPT_URL            => $request->url
        );

        if (! empty($request->headers)) {
            $headers = array();
            foreach ($request->headers as $key => $val) {
                array_push($headers, "$key: $val");
            }
            $options[CURLOPT_HTTPHEADER] = $headers;
        }

        if (! empty($request->body)) {
            $options[CURLOPT_POSTFIELDS] = $request->body;
        }

        curl_setopt_array($ch, $options);

        $result = curl_exec($ch);
        $ret    = curl_errno($ch);

        if ($ret !== 0) {
            $r = new Response(curl_error($ch), array(), NULL);
            curl_close($ch);

            return $r;
        }

        $code        = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers     = self::parseHeaders(substr($result, 0, $header_size));
        $body        = substr($result, $header_size);
        curl_close($ch);

        return new Response($code, $headers, $body);
    }

    private static function parseHeaders($raw)
    {
        $headers     = array();
        $headerLines = explode("\r\n", $raw);
        foreach ($headerLines as $line) {
            $headerLine = trim($line);
            $kv         = explode(':', $headerLine);
            if (count($kv) > 1) {
                $headers[$kv[0]] = trim($kv[1]);
            }
        }

        return $headers;
    }

}