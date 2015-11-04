<?php
namespace Hoge\Media;

class AVFormat {

    /**
     * @var enum 文件格式类型，比如TS、MXF等，为整数，对照枚举值填写
     */
    public $fileFormatType = FORMAT_MP4;

    /**
     * @var int 文件格式子类型，为整数，默认为 0
     */
    public $fileFormatSubType = FORMAT_SUBTYPE_UNKNOWN;

    /**
     * @var int 是否包含视频流。包含填1，否则填0，如果大于1，表示有多路视频流
     */
    public $isIncludeVideo = 1;

    /**
     * @var int 是否包含音频流。包含填1，否则填0，如果大于1，表示有多路音频流
     */
    public $isIncludeAudio = 1;

    /**
     * @var int 总体平均码率 bits/S，可选
     */
    public $totalAverDataRate = 0;

    /**
     * @var int 总体最大码率 bits/S，可选
     */
    public $totalMaxDataRate = 0;

    /**
     * @var int 总体最小码率 bits/S，可选
     */
    public $totalMinDataRate = 0;

    /**
     * @var VideoInfo 视频配置
     */
    public $videoInfo = NULL;

    /**
     * @var AudioInfo 音频配置
     */
    public $audioInfo = NULL;

    public function __construct()
    {
    }

    public function toXML()
    {

        if (is_null($this->videoInfo) OR (! $this->videoInfo instanceof VideoInfo)) {
            $this->videoInfo = new VideoInfo();
        }

        if (is_null($this->audioInfo) OR (! $this->audioInfo instanceof AudioInfo)) {
            $this->audioInfo = new AudioInfo();
        }

        return '<AVFormat>
            <FileFormatType>' . hexdec($this->fileFormatType) . '</FileFormatType>
            <FileFormatSubType>' . hexdec($this->fileFormatSubType) . '</FileFormatSubType>
            <IsIncludeVideo>' . $this->isIncludeVideo . '</IsIncludeVideo>
            <IsIncludeAudio>' . $this->isIncludeAudio . '</IsIncludeAudio>
            <TotalAverDataRate>' . $this->totalAverDataRate . '</TotalAverDataRate>
            <TotalMaxDataRate>' . $this->totalMaxDataRate . '</TotalMaxDataRate>
            <TotalMinDataRate>' . $this->totalMinDataRate . '</TotalMinDataRate>
            ' . $this->videoInfo->toXML() . '
            ' . $this->audioInfo->toXML() . '
        </AVFormat>';

    }

}