<?php
namespace Hoge\Transcoder;

use Hoge\Media\AVFormat;

final class TargetFileWithParameters extends TargetFile implements TargetFileInterface {

    public $avFormat;

    public function __construct()
    {
        parent::__construct();
    }

    public function toXML()
    {
        parent::toXML();

        assert($this->avFormat instanceof AVFormat);

        return '<TargetFile>
        <FileType>' . hexdec($this->fileType) . '</FileType>
        <FileName>' . $this->fileName . '</FileName>
        <PathInfo>' . $this->pathInfo . '</PathInfo>
        ' . $this->avFormat->toXML() . '
    </TargetFile>';
    }
}