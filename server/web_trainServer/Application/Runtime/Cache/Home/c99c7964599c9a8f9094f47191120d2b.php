<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="/web_trainServer/Public/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/web_trainServer/Public/uploadify/uploadify.css">

	<script type="text/javascript">
    $(function() {
        $('#file_upload').uploadify({
            'width':'131',
            'height':'49',
            'removeTimeout' : 10000,//文件队列上传完成1秒后删除
            'swf'      : '/web_trainServer/Public/uploadify/uploadify.swf',
            'uploader' : "<?php echo U('home/video/uploadify');?>",
            'method'   : 'post',                        //方法，服务端可以用$_POST数组获取数据
            'buttonText' : '选择视频',                    //设置按钮文本
            'multi': false,                        //允许同时上传多张图片
            'uploadLimit' : 1,
            'onUploadSuccess' : function(file, data, response) {
            alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
        }

        });
    });
</script>
</head>
<body>
	<input id="file_upload" name="file_upload" type="file" multiple="true">
</body>
</html>