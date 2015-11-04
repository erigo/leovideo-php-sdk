<?php
namespace Hoge\Transcoder;

class TargetFile {

    /**
     * @var string 文件类型，0、视频文件，1、音频文件，2、视音频合一文件
     */
    public $fileType = MEDIA_MIXED;

    /**
     * @var string 物理文件名称，不包含路径信息
     */
    public $fileName;

    /**
     * @var string 存储路径信息，可以是X:\test或者\\100.0.0.1\test或者ftp://user:pass@server:port/test
     */
    public $pathInfo;

    public function __construct()
    {
    }

    public function toXML()
    {
        assert(isset($this->pathInfo));
        assert(isset($this->fileName));
    }

}