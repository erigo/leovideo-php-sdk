<?php
namespace Hoge\Transcoder;

class TranscodeTask {

    public $userID;
    public $taskID;
    public $taskName;
    public $executeMode;
    public $callbackAddressInfo;
    public $priority;
    public $sourceFile;
    public $targetFiles;

    public function __construct(
        $taskName,
        SourceFile $sourceFile,
        array $targetFiles,
        $taskID = NULL,
        $userID = 'nobody',
        $executeMode = 0,
        $callback = '',
        $priority = 0)
    {
        $this->taskName    = $taskName;
        $this->sourceFile  = $sourceFile->toXML();
        $this->targetFiles = '';
        foreach ($targetFiles as $targetFile) {
            if ($targetFile instanceof TargetFileInterface) {
                $this->targetFiles .= $targetFile->toXML();
            }
        }
        if (is_null($taskID)) {
            $this->taskID = \Hoge\gen_uuid();
        } else {
            $this->taskID = $taskID;
        }
        $this->userID              = $userID;
        $this->executeMode         = $executeMode;
        $this->callbackAddressInfo = $callback;
        $this->priority            = $priority;
    }

    public function toXML()
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
<AddTranscodeTaskRequest>
    <UserID>' . $this->userID . '</UserID>
    <TaskID>' . $this->taskID . '</TaskID>
    <TaskName>' . $this->taskName . '</TaskName>
    <ExecuteMode>' . $this->executeMode . '</ExecuteMode>
    <CallbackAddressInfo>' . $this->callbackAddressInfo . '</CallbackAddressInfo>
    <Priority>' . $this->priority . '</Priority>
    ' . $this->sourceFile . '
    ' . $this->targetFiles . '
</AddTranscodeTaskRequest>';
    }

}