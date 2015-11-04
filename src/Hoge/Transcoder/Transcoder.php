<?php
namespace Hoge\Transcoder;

use Hoge\Config;
use Hoge\Http\Client;

final class Transcoder {

    const TRANSCODER_API_HOST       = Config::API_HOST;
    const URI_CREATE_SIMPLE_TASK    = '/LeoVideoAPI/service/addTranscodeTask';
    const URI_GET_TASK_PROGRESS     = '/LeoVideoAPI/service/queryTaskProgress';
    const URI_GET_TRANSCODER_STATUS = '/LeoVideoAPI/service/queryActiveTaskStatistics';
    const URI_CANCEL_TASK           = '/LeoVideoAPI/service/cancelTask';
    const URI_RESTART_TASK          = '/LeoVideoAPI/service/restartTask';
    const URI_DELETE_TASK           = '/LeoVideoAPI/service/deleteTask';

    /**
     * 创建转码任务
     *
     * @param TranscodeTask $transcodeTask
     * @return \Hoge\Http\Response
     */
    public static function createTask(TranscodeTask $transcodeTask)
    {
        $request_url     = self::TRANSCODER_API_HOST . self::URI_CREATE_SIMPLE_TASK;
        $request_body    = $transcodeTask->toXML();
        $request_headers = array('Content-type' => 'text/xml');

        return Client::post($request_url, $request_body, $request_headers);
    }

    /**
     * 获取转码服务器当前状态
     *
     * @return \Hoge\Http\Response
     */
    public static function getTranscoderStatus()
    {
        $request_url     = self::TRANSCODER_API_HOST . self::URI_GET_TRANSCODER_STATUS;
        $request_body    = NULL;
        $request_headers = array('Content-type' => 'text/xml');

        return Client::post($request_url, $request_body, $request_headers);
    }

    /**
     * 获取任务的进度，支持批量查询
     *
     * @param array|string $taskIDs
     * @return \Hoge\Http\Response
     */
    public static function getTaskProgress($taskIDs)
    {
        $request_url = self::TRANSCODER_API_HOST . self::URI_GET_TASK_PROGRESS;

        $xml     = new \DOMDocument('1.0', 'UTF-8');
        $xmlRoot = $xml->createElement('QueryTaskProgressRequest');
        if (is_string($taskIDs)) {
            $xmlRoot->appendChild($xml->createElement('TaskID', $taskIDs));
        }
        if (is_array($taskIDs) and count($taskIDs) > 0) {
            foreach ($taskIDs as $tid) {
                $xmlRoot->appendChild($xml->createElement('TaskID', $tid));
            }
        }
        $xml->appendChild($xmlRoot);

        $request_body    = $xml->saveXML();
        $request_headers = array('Content-type' => 'text/xml');

        return Client::post($request_url, $request_body, $request_headers);
    }

    /**
     * 根据任务ID取消任务
     *
     * @param $taskID
     * @return \Hoge\Http\Response
     */
    public static function CancelTask($taskID)
    {
        $request_url = self::TRANSCODER_API_HOST . self::URI_CANCEL_TASK;

        $xml     = new \DOMDocument('1.0', 'UTF-8');
        $xmlRoot = $xml->createElement('CancelTaskRequest');
        $xmlRoot->appendChild($xml->createElement('TaskID', $taskID));
        $xml->appendChild($xmlRoot);

        $request_body    = $xml->saveXML();
        $request_headers = array('Content-type' => 'text/xml');

        return Client::post($request_url, $request_body, $request_headers);
    }

    /**
     * 根据任务ID重启任务
     *
     * @param $taskID
     * @return \Hoge\Http\Response
     */
    public static function RestartTask($taskID)
    {
        $request_url = self::TRANSCODER_API_HOST . self::URI_RESTART_TASK;

        $xml     = new \DOMDocument('1.0', 'UTF-8');
        $xmlRoot = $xml->createElement('RestartTaskRequest');
        $xmlRoot->appendChild($xml->createElement('TaskID', $taskID));
        $xml->appendChild($xmlRoot);

        $request_body    = $xml->saveXML();
        $request_headers = array('Content-type' => 'text/xml');

        return Client::post($request_url, $request_body, $request_headers);
    }

    /**
     * 根据任务ID删除任务
     *
     * @param $taskID
     * @return \Hoge\Http\Response
     */
    public static function DeleteTask($taskID)
    {
        $request_url = self::TRANSCODER_API_HOST . self::URI_DELETE_TASK;

        $xml     = new \DOMDocument('1.0', 'UTF-8');
        $xmlRoot = $xml->createElement('DeleteTaskRequest');
        $xmlRoot->appendChild($xml->createElement('TaskID', $taskID));
        $xml->appendChild($xmlRoot);

        $request_body    = $xml->saveXML();
        $request_headers = array('Content-type' => 'text/xml');

        return Client::post($request_url, $request_body, $request_headers);
    }
}