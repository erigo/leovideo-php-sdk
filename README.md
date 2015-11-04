# 大洋 LeoVideo 云转码 SDK for PHP

## 安装

推荐通过 composer 安装，运行下面的命令即可：

```
composer require leovideo/leovideo-php-sdk
```

## 使用方法

### 提交转码任务（示例）

```php
use Hoge\Media\AVFormat;
use Hoge\Transcoder\TargetFileWithParameters;
use Hoge\Transcoder\TranscodeTask;
use Hoge\Transcoder\SourceFile;
use Hoge\Transcoder\TargetFileWithTemplate;
use Hoge\Transcoder\Transcoder;
...

    $sourceFile           = new SourceFile();
    $sourceFile->pathInfo = 'ftp://user:passwd@ftp.example.com/path/to';
    $sourceFile->fileName = 'filename.mp4';

    $targetFile           = new TargetFileWithTemplate();
    $targetFile->pathInfo = 'ftp://user:passwd@ftp.example.com/path/to';
    $targetFile->fileName = 'filename.mp4';

    $transcodeTask = new TranscodeTask('test1', $sourceFile, array($targetFile));
    $response      = Transcoder::createTask($transcodeTask);

...
```