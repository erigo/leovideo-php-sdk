<?php
namespace Hoge\Transcoder;

class SourceFile {

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

    /**
     * @var string 文件验证代码，如果需要对源文件进行校验时填写
     */
    public $fileVerifyCode = '';

    /**
     * @var int 文件入点，对于视频单位是帧，音频单位是采样点，当需要对文件源文件剪切时填
     */
    public $markIn = 0;

    /**
     * @var int 文件出点，对于视频单位是帧，音频单位是采样点，当需要对文件源文件剪切时填写
     */
    public $markOut = 0;

    /**
     * @var int 文件长度，视频用帧；音频用采样点
     */
    public $fileLength = '';

    /**
     * @var int 源音频文件的声道开始序号，是指在目标所有声道中的序号，从0开始，可能大于0
     */
    public $channelIndex = '';

    /**
     * @var int 多段拼接转码时的拼接序号，从1开始
     */
    public $spliceIndex = '';

    /**
     * @var string 素材的AFD信息，如果转码涉及到上下变换，那么就会使用源的AFD值作为依据选择上下
     *             变换的方式；取值为0-15；只能通过源AFD的值间接控制上下变换方式，无法直接控制
     */
    public $AFD = '';

    /**
     * @var string
     */
    public $extendAttribute = '';

    public function __construct()
    {
    }

    public function toXML()
    {
        assert(isset($this->pathInfo));
        assert(isset($this->fileName));

        return '<SourceFile>
        <FileType>' . hexdec($this->fileType) . '</FileType>
        <FileName>' . $this->fileName . '</FileName>
        <PathInfo>' . $this->pathInfo . '</PathInfo>
        <FileVerifyCode>' . $this->fileVerifyCode . '</FileVerifyCode>
        <MarkIn>' . $this->markIn . '</MarkIn>
        <MarkOut>' . $this->markOut . '</MarkOut>
        <FileLength>' . $this->fileLength . '</FileLength>
        <ChannelIndex>' . $this->channelIndex . '</ChannelIndex>
        <SpliceIndex>' . $this->spliceIndex . '</SpliceIndex>
        <AFD>' . $this->AFD . '</AFD>
        <ExtendAttribute>' . $this->extendAttribute . '</ExtendAttribute>
    </SourceFile>';
    }

}