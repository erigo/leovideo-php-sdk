<?php
namespace Hoge;

// Execute Mode
define('EXECUTE_MODE_NORMAL', '0x00000000');
define('EXECUTE_MODE_DISTRIBUTE', '0x00000001');

// File Type
define('MEDIA_VIDEO_ONLY', '0x00000000');
define('MEDIA_AUDIO_ONLY', '0x00000001');
define('MEDIA_MIXED', '0x00000002');

// File Format
define('FORMAT_UNKNOWN', '0x00000000');
define('FORMAT_AVI', '0x00000001');
define('FORMAT_WAV', '0x00000004');
define('FORMAT_ES', '0x00000010');
define('FORMAT_PS', '0x00000020');
define('FORMAT_TS', '0x00000040');
define('FORMAT_MXF', '0x00010000');
define('FORMAT_3GP', '0x00000400');
define('FORMAT_FLV', '0x00000800');
define('FORMAT_MP4', '0x00000080');
define('FORMAT_WMV', '0x02000000');
define('FORMAT_MOV', '0x04000000');
define('FORMAT_DPX', '0x00008001');
define('FORMAT_HLS', '0x00008004');
define('FORMAT_AMR', '0x00008007');

// File Format SubType
define('FORMAT_SUBTYPE_UNKNOWN', '0x00000000');
define('FORMAT_SUBTYPE_MXF_XDCAM', '0x00000001');
define('FORMAT_SUBTYPE_TS_VBR', '0x00000001');
define('FORMAT_SUBTYPE_MP4_EXTENDED', '0x00000001');

// Video Codec - Video Coding Format
define('VIDEO_CODEC_UNKNOWN', '0x00000000');
define('VIDEO_CODEC_FLV', '0x00080000');
define('VIDEO_CODEC_DPX', '0x00080001');
define('VIDEO_CODEC_MPEG4', '0x00000200');
define('VIDEO_CODEC_WMV', '0x00008000');
define('VIDEO_CODEC_QTV', '0x00010000');
define('VIDEO_CODEC_H263', '0x00400000');
define('VIDEO_CODEC_H264', '0x00800000');
define('VIDEO_CODEC_H265', '0x40000000');
define('VIDEO_CODEC_MPEG2_I', '0x00000004');
define('VIDEO_CODEC_MPEG2_IBP', '0x00000008');
define('VIDEO_CODEC_MPEG2_D10', '0x00000010');
define('VIDEO_CODEC_DV25', '0x00000020');
define('VIDEO_CODEC_DV50', '0x00000040');
define('VIDEO_CODEC_DVSD', '0x00000080');
define('VIDEO_CODEC_DVHD', '0x00040000');
define('VIDEO_CODEC_P2AVC', '0x04000000');  // P2 AVC Intra
define('VIDEO_CODEC_APR422', '0x10000000'); // Apple ProRes 422
define('VIDEO_CODEC_DNxHD', '0x08000000');

// Codec Profile
define('CODEC_PROFILE_UNKNOWN', '0x00000000');
define('CODEC_H264_BASELINE', '0x00000000');
define('CODEC_H264_MAIN', '0x00000001');
define('CODEC_H264_HIGH', '0x00000002');
define('CODEC_H264_EXTENDED', '0x00000006');
define('CODEC_H264_HIGH10', '0x00000007');
define('CODEC_H264_HIGH422', '0x00000008');
define('CODEC_H264_HIGH444', '0x00000009');

define('CODEC_WMV_V8', '0x00000000');
define('CODEC_WMV_V9', '0x00000001');
define('CODEC_WMV_V7', '0x00000002');
define('CODEC_WMV_VC1', '0x00000003');

define('CODEC_DVHD_1080_50I', '0x00000000');
define('CODEC_DVHD_1080_60I', '0x00000001');
define('CODEC_DVHD_720_50P', '0x00000002');
define('CODEC_DVHD_720_60P', '0x00000003');

define('CODEC_DNxHD_1080_50I_185_8bit', '0x00000000');
define('CODEC_DNxHD_1080_50I_120_8bit', '0x00000001');
define('CODEC_DNxHD_1080_50I_185_10bit', '0x00000002');
define('CODEC_DNxHD_1080_5994I_220_8bit', '0x00000004');
define('CODEC_DNxHD_1080_5994I_145_8bit', '0x00000005');
define('CODEC_DNxHD_1080_5994I_220_10bit', '0x00000006');

define('CODEC_QTV_DVC_NTSC', '0x64766320');
define('CODEC_QTV_DVC_PAL', '0x64766370');
define('CODEC_QTV_DVC_PROPAL', '0x64767070');
define('CODEC_QTV_DVC_PRO50PAL', '0x64763570');
define('CODEC_QTV_DVC_PRO50NTSC', '0x6476356E');
define('CODEC_QTV_DVC_PROHD1080I60', '0x64766836');
define('CODEC_QTV_DVC_PROHD1080I50', '0x64766835');

// Video Scan Mode
define('SCAN_MODE_FIELD', '0x00000000');
define('SCAN_MODE_PROGRESSIVE', '0x00000002');

// Video Color Format
define('COLOR_FORMAT_UNKNOWN', '0x00000000');
define('COLOR_FORMAT_422', '0x00000200');
define('COLOR_FORMAT_420', '0x00000400');

// Video Rate
define('VARIABLE_BITRATE', '0x00000000');
define('CONSTANT_BITRATE', '0x00000001');

// Audio Codec - Audio Coding Format
define('AUDIO_CODEC_UNKNOWN', '0x00000000');
define('AUDIO_CODEC_PCM', '0x00000001');
define('AUDIO_CODEC_MP1', '0x00000004');
define('AUDIO_CODEC_MP2', '0x00000008');
define('AUDIO_CODEC_MP3', '0x00000010');
define('AUDIO_CODEC_MPEG4', '0x00000002');
define('AUDIO_CODEC_AAC', '0x00000020');
define('AUDIO_CODEC_AC3', '0x00000040');
define('AUDIO_CODEC_DTS', '0x00000080');
define('AUDIO_CODEC_DOLBY_E', '0x00001000');
define('AUDIO_CODEC_EAC3', '0x00002000');
define('AUDIO_CODEC_WMA', '0x00000200');
define('AUDIO_CODEC_QTA', '0x00000400');
define('AUDIO_CODEC_FLV', '0x00040000');

// Audio SubType
define('AUDIO_SUBTYPE_UNKNOWN', '0x00000000');