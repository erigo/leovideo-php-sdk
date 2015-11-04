<?php
namespace Hoge\Media;

class VideoInfo {

    /**
     * @var string 视频编码类型，对照枚举值填写，比如 MPEG2 IBP 帧为8
     */
    public $videoCodingFormat = VIDEO_CODEC_H264;

    /**
     * @var string 视频编解码的子类型，有些视频格式有子类型，默认 0
     */
    public $videoSubType = CODEC_H264_BASELINE;

    /**
     * @var string 图像宽度（水平分辨率）
     */
    public $cxSize = '';

    /**
     * @var string 图像高度（垂直分辨率）
     */
    public $cySize = '';

    /**
     * @var int 基本帧率，视频帧率等于StandardRate/StandardScale
     */
    public $standardRate = '';

    /**
     * @var int 系数，视频帧率等于StandardRate/StandardScale
     */
    public $standardScale = 1;

    /**
     * @var int 视频扫描帧场数据排列方式
     */
    public $scanMode = 2;

    /**
     * @var int 视频颜色格式
     */
    public $colorFormat = 1024;

    /**
     * @var int 视频码率，单位：bps
     */
    public $videoBitrate;

    /**
     * @var int 是否为恒定码率编码
     */
    public $isConstantRate = CONSTANT_BITRATE;

    /**
     * @var int GOP大小，IBP帧压缩类型时的IBP帧组大小，比如IBBPBBPBBPBB为12
     */
    public $gopSize = 12;

    /**
     * @var int 参考周期，IBP帧压缩类型时I和P帧的间隔，比如IBPBP...为2，IBBPBBP...为3
     */
    public $referencePeriod = 3;

    /**
     * @var int Y分量值，1:Y[16-235]normal, 0:Y[0-255]KEY；默认1
     */
    public $isY16_235 = 1;

    /**
     * @var int 视频显示幅宽度值
     */
    public $displayWidth = '';

    /**
     * @var int 视频显示幅高度值
     */
    public $displayHeight = '';

    /**
     * @var int 源基色的色度坐标(ISO13818-2)，可选
     */
    public $colorPrimaries = 5;

    /**
     * @var int 光电转换特性(ISO13818-2)，可选
     */
    public $colorTransfer = 5;

    /**
     * @var int 颜色空间变换系数(ISO13818-2)，可选
     */
    public $colorMatrix = 5;

    /**
     * @var int 素材的AFD信息(SMPTE 2016-1)，可选
     */
    public $AFD = 8;

    /**
     * @var int 最大码率，可选
     */
    public $maxDataRateInBitsPerSec = 0;

    /**
     * @var int 最小码率，可选
     */
    public $minDataRateInBitsPerSec = 0;

    public function __construct()
    {
    }

    public function toXML()
    {
        return '<VideoInfo>
                <VideoCodingFormat>' . hexdec($this->videoCodingFormat) . '</VideoCodingFormat>
                <VideoSubType>' . hexdec($this->videoSubType) . '</VideoSubType>
                <CXSize>' . $this->cxSize . '</CXSize>
                <CYSize>' . $this->cySize . '</CYSize>
                <StandardRate>' . $this->standardRate . '</StandardRate>
                <StandardScale>' . $this->standardScale . '</StandardScale>
                <ScanMode>' . $this->scanMode . '</ScanMode>
                <ColorFormat>' . $this->colorFormat . '</ColorFormat>
                <VideoBitrate>' . $this->videoBitrate . '</VideoBitrate>
                <IsConstantRate>' . hexdec($this->isConstantRate) . '</IsConstantRate>
                <GOPSize>' . $this->gopSize . '</GOPSize>
                <ReferencePeriod>' . $this->referencePeriod . '</ReferencePeriod>
                <IsY16_235>' . $this->isY16_235 . '</IsY16_235>
                <DisplayWidth>' . $this->displayWidth . '</DisplayWidth>
                <DisplayHeight>' . $this->displayHeight . '</DisplayHeight>
                <ColorPrimaries>' . $this->colorPrimaries . '</ColorPrimaries>
                <ColorTransfer>' . $this->colorTransfer . '</ColorTransfer>
                <ColorMatrix>' . $this->colorMatrix . '</ColorMatrix>
                <AFD>' . $this->AFD . '</AFD>
                <MaxDataRateInBitsPerSec>' . $this->maxDataRateInBitsPerSec . '</MaxDataRateInBitsPerSec>
                <MinDataRateInBitsPerSec>' . $this->minDataRateInBitsPerSec . '</MinDataRateInBitsPerSec>
            </VideoInfo>';
    }

}