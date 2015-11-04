# 大洋转码 API 参考

## 创建任务（使用转码模板）

**请求地址**

```
[POST] /LeoVideoAPI/service/addTranscodeTask
```

**请求示例**

```xml
<?xml version="1.0" encoding="UTF-8"?>
<AddTranscodeTaskRequest>
    <UserID>DYMAM</UserID>
    <TaskID>K178AA64-BAC1-49f0-A8B2-B8E79A0CE5F6</TaskID>
    <TaskName>普通转码任务（格式模板）</TaskName>
    <ExecuteMode>1</ExecuteMode>
    <SourceFile>
        <FileType>2</FileType>
        <FileName>HD10min00.avi</FileName>
        <StorageType>1</StorageType>
        <PathInfo>Z:\src\</PathInfo>
    </SourceFile>
    <TargetFile>
        <FileType>2</FileType>
        <FileName>1234.mxf</FileName>
        <StorageType>1</StorageType>
        <PathInfo>Z:\tar</PathInfo>
        <FormatTemplate>MXF-IBP-50</FormatTemplate>
    </TargetFile>
</AddTranscodeTaskRequest>
```

**参数说明**

参数                | 类型   | 必填  | 说明
------------------- | ------ | ----- | ------------------------------------------------------------------------------------
UserID              | string | Y     | 提交任务的用户 ID，或者是提交的系统的ID，比如 EDIT，MAM 等
TaskID              | string | Y     | 任务的唯一标示，不可重复，建议使用 GUID 或者 UUID
TaskName            | string | Y     | 任务名称
ExecuteMode         | int    | N     | 任务执行模式 0：自适应1：单任务 2：分布式任务；默认为0
CallbackAddressInfo | string | N     | 异步回调地址URL，任务执行完毕回调通知时使用本地址，如果不填写这个地址，则不会回调
Priority            | int    | N     | 优先级，默认为0，数字越大优先级越高
SourceFile          |        | Y     | 需要转码的文件
 - FileType         | int    | Y     | 文件类型，0、视频文件，1、音频文件，2、视音频合一文件
 - FileName         | string | Y     | 物理文件名称，不包含路径信息
 - StorageType      | string | Y     | 存储路径类型，0、FTP；1、UNC路径
 - PathInfo         | string | Y     | 存储路径信息，可以是X:\test或者\\100.0.0.1\test或者ftp://user:pass@server:port/test
 - FileVerifyCode   | string | N     | 文件验证代码，如果需要对源文件进行校验时填写
 - MarkIn           | int    | N     | 文件入点，对于视频单位是帧，音频单位是采样点，当需要对文件源文件剪切时填写
 - MarkOut          | int    | N     | 文件出点，对于视频单位是帧，音频单位是采样点，当需要对文件源文件剪切时填写
 - FileLength       | int    | N     | 文件长度，视频用帧；音频用采样点
 - ChannelIndex     | int    | N     | 源音频文件的声道开始序号，是指在目标所有声道中的序号，从0开始，可能大于0
 - SpliceIndex      | int    | N     | 多段拼接转码时的拼接序号，从1开始
 - AFD              | int    | N     | 素材的AFD信息，如果转码涉及到上下变换，那么就会使用源的AFD值作为依据选择上下变换的方式；取值为0-15；只能通过源AFD的值间接控制上下变换方式，无法直接控制
TargetFile          |        | Y     | 转码后输出文件，多文件输出只需要循环此节点
 - FileType         | string | Y     | 文件类型，0、视频文件，1、音频文件，2、视音频合一文件
 - FileName         | string | Y     | 物理文件名称，不包含路径信息
 - StorageType      | int    | Y     | 存储路径类型，0、FTP；1、UNC路径
 - PathInfo         | string | Y     | 存储路径信息，可以是X:\test或者\\100.0.0.1\test或者ftp://user:pass@server:port/test
 - FormatTemplate   | string | Y     | 视音频格式模板名称，填写模板名称后可以不用填写下面的详细文件格式

**返回示例**

```xml
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<AddTranscodeTaskResponse>
    <CommonResponse>
        <Status>0</Status>
        <Description>success</Description>
    </CommonResponse>
</AddTranscodeTaskResponse>
```

## 创建任务（自定义转码参数）

**请求地址**

```
[POST] /LeoVideoAPI/service/addTranscodeTask
```

**请求示例**

```xml
<?xml version="1.0" encoding="UTF-8"?>
<AddTranscodeTaskRequest>
    <UserID>DYMAM</UserID>
    <TaskID>K178AA64-BAC1-49f0-A8B2-B8E79A0CE5F6</TaskID>
    <TaskName>普通转码任务（格式模板）</TaskName>
    <ExecuteMode>1</ExecuteMode>
    <SourceFile>
        <FileType>2</FileType>
        <FileName>HD10min00.avi</FileName>
        <StorageType>1</StorageType>
        <PathInfo>Z:\src\</PathInfo>
    </SourceFile>
    <TargetFile>
        <FileType>2</FileType>
        <FileName>1234.mxf</FileName>
        <StorageType>1</StorageType>
        <PathInfo>Z:\tar</PathInfo>
        <AVFormat>
            <FileFormatType>65536</FileFormatType>
            <FileFormatSubType>0</FileFormatSubType>
            <IsIncludeVideo>1</IsIncludeVideo>
            <IsIncludeAudio>0</IsIncludeAudio>
            <TotalAverDataRate>0</TotalAverDataRate>
            <TotalMaxDataRate>0</TotalMaxDataRate>
            <TotalMinDataRate>0</TotalMinDataRate>
            <VideoInfo>
                <VideoCodingFormat>8</VideoCodingFormat>
                <VideoSubType>0</VideoSubType>
                <CXSize>1920</CXSize>
                <CYSize>1080</CYSize>
                <StandardRate>25</StandardRate>
                <StandardScale>1</StandardScale>
                <ScanMode>0</ScanMode>
                <ColorFormat>512</ColorFormat>
                <VideoBitrate>50000000</VideoBitrate>
                <IsConstantRate>3</IsConstantRate>
                <GOPSize>12</GOPSize>
                <ReferencePeriod>1</ReferencePeriod>
                <IsY16_235>0</IsY16_235>
                <DisplayWidth>16</DisplayWidth>
                <DisplayHeight>9</DisplayHeight>
            </VideoInfo>
            <AudioInfo>
                <AudioCodingFormat>1</AudioCodingFormat>
                <AudioSubType>0</AudioSubType>
                <Channels>2</Channels>
                <AudioDataRate>1536000</AudioDataRate>
                <AudioSamplingFreq>48000</AudioSamplingFreq>
                <AudioBitDepth>16</AudioBitDepth>
                <BlockAlign>4</BlockAlign>
            </AudioInfo>
        </AVFormat>
    </TargetFile>
</AddTranscodeTaskRequest>
```

**转码参数说明**

参数                       | 类型   | 必填 | 说明
-------------------------- | ------ | ---- | ---------------------------------------------------------------------------------------
FileFormatType             | int    | N    | 文件格式类型，比如TS、MXF等，为整数，对照枚举值填写
FileFormatSubType          | int    | N    | 文件格式子类型，为整数，默认为0
IsIncludeVideo             | int    | N    | 是否包含视频流。包含填1，否则填0，如果大于1，表示有多路视频流
IsIncludeAudio             | int    | N    | 是否包含音频流。包含填1，否则填0，如果大于1，表示有多路音频流
TotalAverDataRate          | int    | N    | 总体平均码率 bits/S，可选
TotalMaxDataRate           | int    | N    | 总体最大码率 bits/S，可选
TotalMinDataRate           | int    | N    | 总体最小码率 bits/S，可选
VideoInfo                  |        | N    | 视频参数，可选
 - VideoCodingFormat       | int    | N    | 视频编码类型，对照枚举值填写，比如MPEG2 IBP帧为8
 - VideoSubType            | int    | N    | 视频编解码的子类型，有些视频格式有子类型，默认0
 - CXSize                  | int    | N    | 图像宽度（水平分辨率）
 - CYSize                  | int    | N    | 图像高度（垂直分辨率）
 - StandardRate            | int    | N    | 基本帧率，视频帧率等于StandardRate/StandardScale
 - StandardScale           | int    | N    | 系数，视频帧率等于StandardRate/StandardScale
 - ScanMode                | int    | N    | 视频扫描帧场数据排列方式
 - ColorFormat             | int    | N    | 视频颜色格式
 - VideoBitrate            | int    | N    | 视频码率
 - IsConstantRate          | int    | N    | 是否为恒定码率编码
 - GOPSize                 | int    | N    | GOP大小，IBP帧压缩类型时的IBP帧组大小
 - ReferencePeriod         | int    | N    | 参考周期，IBP帧压缩类型时IP帧的间隔周期
 - IsY16_235               | int    | N    | Y分量值，1:Y[16-235]normal, 0:Y[0-255]KEY；默认1
 - DisplayWidth            | int    | N    | 视频显示幅宽度值，默认值：4
 - DisplayHeight           | int    | N    | 视频显示幅高度值，默认值：3
 - ColorPrimaries          | int    | N    | 源基色的色度坐标(ISO13818-2)，可选，默认值：5
 - ColorTransfer           | int    | N    | 光电转换特性(ISO13818-2)，可选，默认值：5
 - AFD                     | int    | N    | 素材的AFD信息(SMPTE 2016-1)，可选，默认值：8
 - MaxDataRateInBitsPerSec | int    | N    | 最大码率，可选，默认值：0
 - MinDataRateInBitsPerSec | int    | N    | 最小码率，可选，默认值：0
AudioInfo                  |        | N    | 音频参数，可选
 - AudioCodingFormat       | int    | N    | 音频编码类型，对照枚举值填写
 - AudioSubType            | int    | N    | 音频编码子类型，有些音频编码有子类型，默认填：0
 - Channels                | int    | N    | 声道数目，比如双声道填2
 - AudioDataRate           | int    | N    | 音频码率 bits/s，等于AudioSamplingFreq\*Channels\*AudioBitDepth
 - AudioSamplingFreq       | int    | N    | 每秒采样数量
 - AudioBitDepth           | int    | N    | 量化位数，采样的量化位数，比如16
 - BlockAlign              | int    | N    | 每采样字节数量，等于声道数*量化位数/8, 量化位数(16,20,24,32...)
 - AudioCFG                | int    | N    | 声道属性，可选，默认值：1
 - ChannelSamplesFormat    | int    | N    | 声道采样数据格式，可选，默认值：1

**返回示例**

```xml
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<AddTranscodeTaskResponse>
    <CommonResponse>
        <Status>0</Status>
        <Description>success</Description>
    </CommonResponse>
</AddTranscodeTaskResponse>
```

## 查询任务进度

**请求地址**

```
[POST] /LeoVideoAPI/service/queryTaskProgress
```
**请求示例**

```xml
<?xml version="1.0" encoding="UTF-8"?>
<QueryTaskProgressRequest>
	<TaskID>d0ce1078-6ab9-422f-c22ffc05ed2d</TaskID>
	<TaskID>d0ce1078-6ab9-422f-c22ffc05ed2d</TaskID>
</QueryTaskProgressRequest>
```

**参数说明**

参数   | 类型   | 必填 | 说明
------ | ------ | ---- | -------
TaskId | string | Y    | 任务ID

**返回示例**

```xml
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<QueryTaskProgressResponse>
    <CommonResponse>
        <Status>0</Status>
        <Description>success</Description>
    </CommonResponse>
    <TaskProgress>
        <TaskID>d0ce1078-6ab9-422f-c22ffc05ed2d</TaskID>
        <TaskProgress>0</TaskProgress>
        <TaskStatus>3</TaskStatus>
    </TaskProgress>
</QueryTaskProgressResponse>
```

##取消任务

**请求地址**

```
[POST] /LeoVideoAPI/service/cancelTask
```
**请求示例**

```xml
<?xml version="1.0" encoding="UTF-8"?>
<CancelTaskRequest>
    <TaskID>d0ce1078-6ab9-422f-c22ffc05ed2d</TaskID>
</CancelTaskRequest>
```

**参数说明**

参数   | 类型   | 必填 | 说明
------ | ------ | ---- | -------
TaskId | string | Y    | 任务ID

**返回示例**

```xml
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<CancelTaskResponse>
    <CommonResponse>
        <Status>0</Status>
        <Description>success</Description>
    </CommonResponse>
</CancelTaskResponse>
```
##重新开始任务

**请求地址**

```
[POST] /LeoVideoAPI/service/restartTask
```
**请求示例**

```xml
	<?xml version="1.0" encoding="UTF-8"?>
	<RestartTaskRequest>
		<TaskID>d0ce1078-6ab9-422f-c22ffc05ed2d</TaskID>
	</RestartTaskRequest>
```

**参数说明**

参数   | 类型   | 必填 | 说明
------ | ------ | ---- | -------
TaskId | string | Y    | 任务ID

**返回示例**

```xml
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<RestartTaskResponse>
    <CommonResponse>
        <Status>0</Status>
        <Description>success</Description>
    </CommonResponse>
</RestartTaskResponse>
```
##删除任务

**请求地址**

```
[POST] /LeoVideoAPI/service/deleteTask
```
**请求示例**

```xml
	<?xml version="1.0" encoding="UTF-8"?>
	<DeleteTaskRequest>
		<TaskID>d0ce1078-6ab9-422f-c22ffc05ed2d</TaskID>
	</DeleteTaskRequest>
```

**参数说明**

参数   | 类型   | 必填 | 说明
------ | ------ | ---- | -------
TaskId | string | Y    | 任务ID

**返回示例**

```xml
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<DeleteTaskResponse>
    <CommonResponse>
        <Status>0</Status>
        <Description>success</Description>
    </CommonResponse>
</DeleteTaskResponse>
```


##查询当前转码器所有任务

**请求地址**

```
[POST] /LeoVideoAPI/service/queryActiveTaskStatistics
```

**参数说明**

无请求参数

**返回示例**

```xml
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<QueryActiveTaskStatisticsResponse>
    <CommonResponse>
        <Status>0</Status>
    </CommonResponse>
    <ActiveTaskStatistics>
        <ActiveTaskCount>0</ActiveTaskCount>
        <RunningTaskCount>0</RunningTaskCount>
        <WaitingTaskCount>0</WaitingTaskCount>
    </ActiveTaskStatistics>
</QueryActiveTaskStatisticsResponse>
```

**参数说明**

参数             | 类型   | 说明
---------------- | ------ | ------------------------
Status           | int    | 返回状态
ActiveTaskCount  | int    | 当前激活任务数量
RunningTaskCount | int    | 当前正在转码中的任务数量
WaitingTaskCount | int    | 等待中的任务数量

## 通用返回说明

**示例**

```xml
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<AddTranscodeTaskResponse>
    <CommonResponse>
        <Status>0</Status>
        <Description>success</Description>
    </CommonResponse>
</AddTranscodeTaskResponse>
```

**参数说明**

参数         | 类型   | 说明
------------ | ------ | ----------------
Status       | int    | 返回状态
Description  | string | 状态文字描述