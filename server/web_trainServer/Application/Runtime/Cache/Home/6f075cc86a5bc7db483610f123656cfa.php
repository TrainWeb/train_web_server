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
    <!--       <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li> -->
          <li><a href="<?php echo U('home/admin/logout');?>"><span class="am-icon-power-off"></span> 退出</a></li>
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

        <div class="am-cf am-padding">
             <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> <small></small></div>
        </div>
      
        <ul class="am-avg-sm-1 am-avg-md-3 am-margin am-padding am-text-center admin-content-list ">
              <li><a href="#" class="am-text-danger
              "><span class="am-icon-btn am-icon-user-md"></span><br>订单申请数量<br>3000</a></li>
              <li><a href="#" class="am-text-warning"><span class="am-icon-btn am-icon-recycle"></span><br>正在处理的订单数量<br>80082</a></li>
              <li><a href="#" class="am-text-secondary"><span class="am-icon-btn am-icon-briefcase"></span><br>成交订单数量<br>308</a></li>
        </ul>

            <div class="am-u-sm-12">
                      <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                          <th>ID</th><th>用户名</th><th>订单类型</th><th>订单状态</th><th>订单时间</th><th>查看详情及操作</th>
                        </tr>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><td>1</td><td>Lee</td><td><a href="#">食品</a></td> <td><span class="am-badge am-badge-danger">等待接受订单</span></td><td>xxxx-xx-xx</td>
                          <td>
                            <div class="am-dropdown" data-am-dropdown="">
                             <button class="am-btn am-btn-default am-btn-xs" data-toggle="modal" data-target="#myModal" ><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                                <!-- 模态框（Modal） -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
                                   aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999">
                                   <div class="modal-dialog">
                                      <div class="modal-content">
                                         <div class="modal-header">
                                            <button type="button" class="close" 
                                               data-dismiss="modal" aria-hidden="true">
                                                  &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">
                                               订单详细信息
                                            </h4>
                                         </div>
                                         <div class="modal-body">
                                            用户名：xxx<br>
                                            位置:xxx<br>
                                            订单类型：食品<br>
                                            订单申请时间：xxxx<br>
                                            订单详情:<br>
                                            {}<br>
                                         </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default" 
                                               data-dismiss="modal">关闭
                                            </button>
                                            <button type="button" class="btn btn-primary">
                                               接收订单
                                            </button>
                                         </div>
                                      </div><!-- /.modal-content -->
                                </div><!-- /.modal -->
                            </div>
                          </td>
                        </tr>

                         <tr><td>2</td><td>cc</td><td><a href="#">食品</a></td> <td><span class="am-badge am-badge-warning">正在进行中</span></td><td>xxxx-xx-xx</td>
                          <td>
                            <div class="am-dropdown" data-am-dropdown="">
                             <button class="am-btn am-btn-default am-btn-xs" data-toggle="modal" data-target="#myModal2" ><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                                <!-- 模态框（Modal） -->
                                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" 
                                   aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999">
                                   <div class="modal-dialog">
                                      <div class="modal-content">
                                         <div class="modal-header">
                                            <button type="button" class="close" 
                                               data-dismiss="modal" aria-hidden="true">
                                                  &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">
                                               订单详细信息
                                            </h4>
                                         </div>
                                         <div class="modal-body">
                                            用户名：xxx<br>
                                            位置:xxx<br>
                                            订单类型：食品<br>
                                            订单申请时间：xxxx<br>
                                            订单详情:<br>
                                            {}<br>
                                         </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default" 
                                               data-dismiss="modal">关闭
                                            </button>
                                            <button type="button" class="btn btn-primary">
                                               正在进行
                                            </button>
                                         </div>
                                      </div><!-- /.modal-content -->
                                </div><!-- /.modal -->
                            </div>
                          </td>
                        </tr>


                         <tr><td>3</td><td>John Clark</td><td><a href="#">食品</a></td> <td><span class="am-badge am-badge-success">已完成</span></td><td>xxxx-xx-xx</td>
                          <td>
                            <div class="am-dropdown" data-am-dropdown="">
                             <button class="am-btn am-btn-default am-btn-xs" data-toggle="modal" data-target="#myModal3" ><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                                <!-- 模态框（Modal） -->
                                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" 
                                   aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:9999">
                                   <div class="modal-dialog">
                                      <div class="modal-content">
                                         <div class="modal-header">
                                            <button type="button" class="close" 
                                               data-dismiss="modal" aria-hidden="true">
                                                  &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">
                                               订单详细信息
                                            </h4>
                                         </div>
                                         <div class="modal-body">
                                            用户名：xxx<br>
                                            位置:xxx<br>
                                            订单类型：食品<br>
                                            订单申请时间：xxxx<br>
                                            订单详情:<br>
                                            {}<br>
                                         </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default" 
                                               data-dismiss="modal">关闭
                                            </button>
                                            <button type="button" class="btn btn-primary">
                                               已完成
                                            </button>
                                         </div>
                                      </div><!-- /.modal-content -->
                                </div><!-- /.modal -->
                            </div>
                          </td>
                        </tr>


                        </tbody>
                      </table>

                <hr></hr>
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