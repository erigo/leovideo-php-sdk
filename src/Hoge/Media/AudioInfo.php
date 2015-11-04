<?php
namespace Hoge\Media;

class AudioInfo {

    /**
     * @var string 音频编码类型，对照枚举值填写
     */
    public $audioCodingFormat = AUDIO_CODEC_AAC;

    /**
     * @var int 音频编码子类型，有些音频编码有子类型，默认填0
     */
    public $audioSubType = AUDIO_SUBTYPE_UNKNOWN;

    /**
     * @var int 声道数目，比如双声道填2
     */
    public $channels = 2;

    /**
     * @var int 音频码率 bits/s，如果是无压缩的音频如PCM，等于AudioSamplingFreq*Channels*AudioBitDepth；如果是压缩的音频直接指定目标的码率即可
     */
    public $audioDataRate = 128000;

    /**
     * @var int 每秒采样数量，比如48000
     */
    public $audioSamplingFreq = 48000;

    /**
     * @var int 量化位数，采样的量化位数，比如16
     */
    public $audioBitDepth = 16;

    /**
     * @var int 每采样字节数量，等于声道数*量化位数/8, 量化位数(16,20,24,32...)
     */
    public $blockAlign = 4;

    /**
     * @var int 声道属性。可选
     */
    public $audioCFG = 1;

    /**
     * @var int 声道采样数据格式，可选
     */
    public $channelSamplesFormat = 1;

    public function __construct()
    {
    }

    public function toXML()
    {
        return '<AudioInfo>
                <AudioCodingFormat>' . hexdec($this->audioCodingFormat) . '</AudioCodingFormat>
                <AudioSubType>' . hexdec($this->audioSubType) . '</AudioSubType>
                <Channels>' . $this->channels . '</Channels>
                <AudioDataRate>' . $this->audioDataRate . '</AudioDataRate>
                <AudioSamplingFreq>' . $this->audioSamplingFreq . '</AudioSamplingFreq>
                <AudioBitDepth>' . $this->audioBitDepth . '</AudioBitDepth>
                <BlockAlign>' . $this->blockAlign . '</BlockAlign>
                <AudioCFG>' . $this->audioCFG . '</AudioCFG>
                <ChannelSamplesFormat>' . $this->channelSamplesFormat . '</ChannelSamplesFormat>
            </AudioInfo>';
    }

}