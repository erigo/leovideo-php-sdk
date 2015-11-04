<?php
namespace Hoge\Transcoder;

final class TargetFileWithTemplate extends TargetFile implements TargetFileInterface {

    public $formatTemplate = 'test';

    public function __construct()
    {
        parent::__construct();
    }

    public function toXML()
    {
        parent::toXML();

        return '<TargetFile>
        <FileType>' . hexdec($this->fileType) . '</FileType>
        <FileName>' . $this->fileName . '</FileName>
        <PathInfo>' . $this->pathInfo . '</PathInfo>
        <FormatTemplate>' . $this->formatTemplate . '</FormatTemplate>
    </TargetFile>';
    }

}