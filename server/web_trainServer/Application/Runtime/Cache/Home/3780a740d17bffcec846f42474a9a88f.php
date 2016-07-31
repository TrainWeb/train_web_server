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
        <link rel="stylesheet" href="/web_trainServer/Public/css/buttons.css">

        <script src="/web_trainServer/Public/fileinput/js/jquery-2.0.3.min.js"></script>
        <script src="/web_trainServer/Public/fileinput/js/fileinput.js" type="text/javascript"></script>
        <script src="/web_trainServer/Public/fileinput/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/web_trainServer/Public/fileinput/js/fileinput_locale_zh.js" type="text/javascript"></script>


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
            'uploader' : "<?php echo U('home/vedio/uploadify');?>",
            'method'   : 'post',                        //方法，服务端可以用$_POST数组获取数据
            'buttonText' : '选择视频',                    //设置按钮文本
            'multi': false,                        //允许同时上传多张图片
            'uploadLimit' : 1,
            'onUploadSuccess' : function(file, data, response) {
            alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
            $('#vedio_url').val(data);
            $('#result').html(file.name+'上传成功');
        }

        });
    });
</script>
    </head>
    <body>


<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>高铁方舟</strong> <small>后台管理</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
          <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>


<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="<?php echo U('home/admin/admin');?>"><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 高铁管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="<?php echo U('home/admin/station');?>" class="am-cf"><span class="am-icon-check"></span> 高铁站点</a></li>
            <li><a href="<?php echo U('home/admin/route');?>"><span class="am-icon-puzzle-piece"></span> 高铁路线</a></li>
          </ul>
        </li>
        <li><a href="<?php echo U('home/food/food');?>"><span class="am-icon-table"></span> 食品管理</a></li>
        <li><a href="javascript:void(0);"><span class="am-icon-pencil-square-o"></span> 商品管理</a></li>
        <li><a href="<?php echo U('home/Score/score');?>"><span class="am-icon-sign-out"></span> 积分奖品</a></li>
         <li><a href="<?php echo U('home/Vedio/vedio');?>"><span class="am-icon-sign-out"></span> 视频管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
         <li><a href="<?php echo U('home/Travel/travel');?>"><span class="am-icon-sign-out"></span> 旅行管理</a></li>
      </ul>

    </div>
  </div>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">

    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">视频管理</strong>/<small>视频修改</small></div>
      </div>

      <hr></hr>

    
        <div class="am-tabs am-margin" data-am-tabs="">
      <ul class="am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active"><a href="#tab2">视频修改</a></li>
      </ul>

     

        <div class="am-tab-panel am-fade am-active am-in" id="tab2">

          <form class="am-form" method="post" action="<?php echo U('home/vedio/to_editvedio');?>" enctype="multipart/form-data">
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
              视频名称
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input class="am-input-sm" type="text" name="vedio_name" value="<?php echo ($list["0"]["f_name"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
            </div>


            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right" >
                类型
              </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                <input class="am-input-sm" type="text" name="vedio_type" value="<?php echo ($list["0"]["f_type"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-6"></div>
            </div>

            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                评分
              </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                <input class="am-input-sm" type="text" name="vedio_point" value="<?php echo ($list["0"]["f_point"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-6"></div>
            </div>

            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                上映时间
              </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                <input class="am-input-sm" type="text" name="vedio_year" value="<?php echo ($list["0"]["f_year"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-6">年</div>
            </div>
            
            <input type="text" name="vedio_id" value="<?php echo ($list["0"]["f_id"]); ?>" style="display:none">

            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                价格
              </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                <input class="am-input-sm" type="text" name="vedio_price" value="<?php echo ($list["0"]["f_wprice"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-6">元</div>
            </div>

            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                视频描述
              </div>
              <div class="am-u-sm-12 am-u-md-10">
                <textarea rows="10" placeholder="视频描述..." name="vedio_details"><?php echo ($list["0"]["f_introduction"]); ?></textarea>
              </div>
            </div>
            <div class="am-g am-margin-top-sm">
              <input type="submit" name="" value="提交" style="float:right">
            </div>
            <div>
             
            </div>  
          </form>
        </div>
    </div>
  </div>


        

</body>
</html>