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
  <link rel="icon" type="image/png" href="/Public/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/Public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/Public/assets/css/admin.css">


  <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
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
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-sign-out"></span> 高铁管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="<?php echo U('home/station/station');?>" class="am-cf"> 高铁站点</a></li>
            <li><a href="<?php echo U('home/route/route');?>">高铁路线<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
          </ul>
        </li>
        <li><a href="<?php echo U('home/food/food');?>"><span class="am-icon-sign-out"></span> 食品管理</a></li>
        <li><a href="javascript:void(0);"><span class="am-icon-sign-out"></span> 商品管理</a></li>
        <li><a href="javascript:void(0);"><span class="am-icon-sign-out"></span> 积分奖品</a></li>
         <li><a href="javascript:void(0);"><span class="am-icon-sign-out"></span> 视频管理</a></li>
         <li><a href="javascript:void(0);"><span class="am-icon-sign-out"></span> 旅行管理</a></li>
      </ul>

    </div>
  </div>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">食品管理</strong>/<small>食品编辑</small></div>
      </div>
      <hr></hr>
     <div class="am-tabs am-margin" data-am-tabs="">
      <ul class="am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active"><a href="#tab2">食品编辑</a></li>
      </ul>

     
     
        <div class="am-tab-panel am-fade am-active am-in" id="tab2">
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><form class="am-form" method="post" action="<?php echo U('home/food/to_editfood',array('comm_id'=>$vo['comm_id']));?>">
          
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                食品名称
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input class="am-input-sm" type="text" name="comm_name" value="<?php echo ($vo["comm_name"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-6"></div>
            </div>
      
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                原价
              </div>
              <div class="am-u-sm-8 am-u-md-2 am-u-end col-end">
                <input class="am-input-sm" type="text" name="comm_price" value="<?php echo ($vo["comm_price"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-8">元</div>
            </div>

            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                优惠
              </div>
              <div class="am-u-sm-8 am-u-md-2 am-u-end col-end">
                <input class="am-input-sm" type="text" name="comm_discounted" value="<?php echo ($vo["comm_discounted"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-8">折</div>
            </div>

            <div class="am-g am-margin-top">
              <div class="am-u-md-2 am-text-right" >
                产品数量
              </div>
              <div class="am-u-md-2 am-u-end col-end">
                <input class="am-input-sm" type="text" name="comm_counts" value="<?php echo ($vo["comm_counts"]); ?>">
              </div>
              <div class="am-u-md-8">份</div>
            </div>

            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                食品描述
              </div>
              <div class="am-u-sm-12 am-u-md-10">
                <textarea rows="10" placeholder="食品描述..." name="comm_descr"><?php echo ($vo["comm_descr"]); ?></textarea>
                <input type="submit" name="" value="提交" style="float:right">
              </div>

            </div>

           

          </form><?php endforeach; endif; ?>
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
<script src="/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/Public/assets/js/amazeui.min.js"></script>
<script src="/Public/assets/js/app.js"></script>


</body>
</html>