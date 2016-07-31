<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
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


  <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/web_trainServer/Public/css/buttons.css">
  <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

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
            <li><a href="javascript:void(0);"><span class="am-icon-puzzle-piece"></span> 高铁路线</a></li>
          </ul>
        </li>
        <li><a href="<?php echo U('home/food/food');?>"><span class="am-icon-table"></span> 食品管理</a></li>
        <li><a href="javascript:void(0);"><span class="am-icon-pencil-square-o"></span> 商品管理</a></li>
        <li><a href="<?php echo U('home/Score/score');?>"><span class="am-icon-sign-out"></span> 积分奖品</a></li>
         <li><a href="<?php echo U('home/Video/video');?>"><span class="am-icon-sign-out"></span> 视频管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
         <li><a href="<?php echo U('home/Travel/travel');?>"><span class="am-icon-sign-out"></span> 旅行管理</a></li>
      </ul>

    </div>
  </div>
  <!-- sidebar end -->

    <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">

    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">视频管理</strong></div>
      </div>

      <hr></hr>

      <div class="am-g">

        <div class="am-u-sm-12 am-u-md-9">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <a class="button button-primary button-rounded" href="<?php echo U('home/Video/addvideo');?>"><span class="am-icon-plus"></span> 上传新视频</a>
            </div>
          </div>
        </div>

        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <input class="am-form-field" type="text">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
          </div>
        </div>
      </div>


      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">

              <div class="am-u-sm-12 am-u-md-4">
                <div class="thumbnail">
                  <img alt="300x200" src="/web_trainServer/Public/img/video-pic/video1.jpg" style="height:400px;" />
                    <div class="caption">
                    <h3>
                       视频一
                    </h3>
                    <p>
                      很好看的视频一
                    </p>
                    <p>所需 &nbsp;&nbsp; ￥30</p>
                    <p>
                      <a class="btn btn-primary" href="#">编辑</a> <a class="btn" href="#">删除</a>
                    </p>
                    </div>
                </div>
                </div>
         
                <div class="am-u-sm-12 am-u-md-4">
                <div class="thumbnail">
                  <img alt="300x200" src="/web_trainServer/Public/img/video-pic/video2.jpg" height="400px" style="height:400px;"/>
                    <div class="caption">
                    <h3>
                       视频二
                    </h3>
                    <p>
                      很好看的视频二
                    </p>
                    <p>所需 &nbsp;&nbsp; ￥30</p>
                    <p>
                      <a class="btn btn-primary" href="#">编辑</a> <a class="btn" href="#">删除</a>
                    </p>
                    </div>
                </div>
              </div>
  

                <div class="thumbnail">
                  <img alt="300x200" src="/web_trainServer/Public/img/video-pic/video2.jpg" height="400px" style="height:400px;"/>
                    <div class="caption">
                    <h3>
                       视频三
                    </h3>
                    <p>
                      很好看的视频三
                    </p>
                    <p>所需 &nbsp;&nbsp; ￥30</p>
                    <p>
                      <a class="btn btn-primary" href="#">编辑</a> <a class="btn" href="#">删除</a>
                    </p>
                    </div>
                </div>
 

          </div>
        </div>
      </div>
      <div class="am-cf">
              共 15 条记录
          <div class="am-fr">
                <ul class="am-pagination">
                  <li class="am-disabled"><a href="#">«</a></li>
                  <li class="am-active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
            </div>
            <hr>
          </form>
        </div>

      </div>
        

    </div>
  </div>
  <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/web_trainServer/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/web_trainServer/Public/assets/js/amazeui.min.js"></script>
<script src="/web_trainServer/Public/assets/js/app.js"></script>


</body>
</html>