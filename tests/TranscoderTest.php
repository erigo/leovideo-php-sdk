<?php
namespace Hoge;

use Hoge\Media\AudioInfo;
use Hoge\Media\AVFormat;
use Hoge\Media\VideoInfo;
use Hoge\Transcoder\TargetFileWithParameters;
use Hoge\Transcoder\TranscodeTask;
use Hoge\Transcoder\SourceFile;
use Hoge\Transcoder\TargetFileWithTemplate;
use Hoge\Transcoder\Transcoder;

class TranscoderTest extends \PHPUnit_Framework_TestCase {

    /**
     * 测试创建转码任务（使用转码模板 + 单码率输出）
     */
    public function testCreateTask()
    {
        $sourceFile           = new SourceFile();
        $sourceFile->pathInfo = 'ftp://user:passwd@ftp.example.com/path/to';
        $sourceFile->fileName = 'filename.mp4';

        $targetFile           = new TargetFileWithTemplate();
        $targetFile->pathInfo = 'ftp://user:passwd@ftp.example.com/path/to';
        $targetFile->fileName = 'filename.mp4';

        $transcodeTask = new TranscodeTask('test1', $sourceFile, array($targetFile));
        $response      = Transcoder::createTask($transcodeTask);

        $this->assertEquals($response->statusCode, 200);
        $this->assertNotNull($response->body);
    }

    /**
     * 测试创建转码任务（详细转码参数 + 单码率输出）
     */
    public function testCreateAnotherTask()
    {
        $sourceFile           = new SourceFile();
        $sourceFile->pathInfo = 'ftp://user:passwd@ftp.example.com/path/to';
        $sourceFile->fileName = 'filename.mp4';

        $target_avFormat = new AVFormat();

        $video_codec               = new VideoInfo();
        $video_codec->videoBitrate = 2000000;

        $audio_codec                = new AudioInfo();
        $audio_codec->audioDataRate = 640000;

        $target_avFormat->videoInfo = $video_codec;
        $target_avFormat->audioInfo = $audio_codec;

        $targetFile = new TargetFileWithParameters();

        $targetFile->avFormat = $target_avFormat;
        $targetFile->pathInfo = 'ftp://user:passwd@ftp.example.com/path/to';
        $targetFile->fileName = 'filename.mp4';

        $anotherTranscodeTask = new TranscodeTask('test2', $sourceFile, array($targetFile));

        $response = Transcoder::createTask($anotherTranscodeTask);

        $this->assertEquals($response->statusCode, 200);
        $this->assertNotNull($response->body);
    }

    /**
     * 测试获取任务进度
     */
    public function testGetTaskProgress()
    {
        $response = Transcoder::getTaskProgress(array('first-task', 'second-task'));

        $this->assertEquals($response->statusCode, 200);
        $this->assertNotNull($response->body);
    }

    /**
     * 测试获取转码服务器状态
     */
    public function testGetTranscoderStatus()
    {
        $response = Transcoder::getTranscoderStatus();

        $this->assertEquals($response->statusCode, 200);
        $this->assertNotNull($response->body);
    }

    /**
     * 测试取消任务
     */
    public function testCancelTask()
    {
        $taskID   = 'first-task';
        $response = Transcoder::CancelTask($taskID);

        $this->assertEquals($response->statusCode, 200);
        $this->assertNotNull($response->body);
    }

    /**
     * 测试重启任务
     */
    public function testRestartTask()
    {
        $taskID   = 'second-task';
        $response = Transcoder::RestartTask($taskID);

        $this->assertEquals($response->statusCode, 200);
        $this->assertNotNull($response->body);
    }

    /**
     * 测试删除任务
     */
    public function testDeleteTask()
    {
        $taskID   = 'another-task';
        $response = Transcoder::DeleteTask($taskID);

        $this->assertEquals($response->statusCode, 200);
        $this->assertNotNull($response->body);
    }

}