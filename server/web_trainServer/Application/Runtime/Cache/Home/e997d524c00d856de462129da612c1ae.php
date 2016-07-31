<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- release v4.1.8, copyright 2014 - 2015 Kartik Visweswaran -->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>高铁方舟后台管理</title>
        <meta name="description" content="这是一个 index 页面">
        <meta name="keywords" content="index">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="icon" type="image/png" href="/web_trainServer/Public/assets/i/favicon.png">
        <link rel="apple-touch-icon-precomposed" href="/web_trainServer/Public/assets/i/app-icon72x72@2x.png">
        <meta name="apple-mobile-web-app-title" content="Amaze UI" />
        <link rel="stylesheet" href="/web_trainServer/Public/assets/css/amazeui.min.css"/>
        <link rel="stylesheet" href="/web_trainServer/Public/assets/css/admin.css">

        <link href="/web_trainServer/Public/fileinput/css/bootstrap.min.css" rel="stylesheet">
        <link href="/web_trainServer/Public/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="/web_trainServer/Public/fileinput/js/jquery-2.0.3.min.js"></script>
        <script src="/web_trainServer/Public/fileinput/js/fileinput.js" type="text/javascript"></script>
        <script src="/web_trainServer/Public/fileinput/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/web_trainServer/Public/fileinput/js/fileinput_locale_zh.js" type="text/javascript"></script>
    </head>
    <body>
              <form id="upload" method="post" action="<?php echo U('home/Uploadimg/Uploadimgs');?>" enctype="multipart/form-data">
              <div class="am-u-sm-12 am-u-md-10">
                <div class="form-group">
                     <input id="file-1" name="pic_all[]" type="file" class="file"  multiple=true  data-upload-url="<?php echo U('Home/Uploadimg/Uploadimg');?>" >
                </div>
                <input type="submit" name="" value="submit">
              </div>
              </form>
    </body>

<script type="text/javascript">
   function initFileInput(ctrName){
    var control = $("#"+ctrName);
    control.fileinput({
        showUpload : false,
        maxFileCount: 1,
        language : 'zh',
        allowedPreviewTypes : [ 'image' ],
        allowedFileExtensions : [ 'jpg', 'png', 'gif' ],
        maxFileSize : 2000,
    });
   }

   initFileInput("file-1");
</script>



</html>