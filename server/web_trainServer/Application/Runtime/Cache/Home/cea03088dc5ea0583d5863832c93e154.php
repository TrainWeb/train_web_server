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
        <link rel="icon" type="image/png" href="/Public/assets/i/favicon.png">
        <link rel="apple-touch-icon-precomposed" href="/Public/assets/i/app-icon72x72@2x.png">
        <meta name="apple-mobile-web-app-title" content="Amaze UI" />
        <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
        <link rel="stylesheet" href="/Public/assets/css/admin.css">

        <link href="/Public/fileinput/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Public/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="/Public/fileinput/js/jquery-2.0.3.min.js"></script>
        <script src="/Public/fileinput/js/fileinput.js" type="text/javascript"></script>
        <script src="/Public/fileinput/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/Public/fileinput/js/fileinput_locale_zh.js" type="text/javascript"></script>


        <script type="text/javascript">

        

          $(document).ready(function(){


            $("a[name=addRow]").click(function(){
              $("table#routetable tbody tr:last").after('<tr><td> </td><td><input class="am-input-sm" type="text" name="station_name[]"></td><td><input class="am-input-sm" type="text" name="station_arrivetime[]"></td><td><input class="am-input-sm" type="text" name="station_leavetion[]"></td><td><a a href="javascript:void(0);" onclick="removeRow(this)"><span class="am-icon-trash-o"></span> 删除</a></td></tr>');
              reorder();
            });

          });


         function removeRow(obj) {

          $(obj).parent().parent().remove();
          reorder();
        }

          function reorder(){
             var t01 = $("table#routetable tbody tr").length;
             for(var i=0;i<t01;i++){
             $("table#routetable tbody tr").eq(i).find("td").eq(0).html(i+1);
           }
          }

        </script>
    </head>
    <body onload="reorder()">


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
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">路线管理</strong>/<small>路线详情</small></div>
      </div>

      <hr></hr>

    
        <div class="am-tabs am-margin" data-am-tabs="">
      <ul class="am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active"><a href="#tab2">路线详情</a></li>
      </ul>

     

        <div class="am-tab-panel am-fade am-active am-in" id="tab2">

            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                路线编号
              </div>
              <?php if(is_array($route_id)): foreach($route_id as $key=>$vo): ?><div class="am-u-sm-8 am-u-md-4">
                <?php echo ($vo["id"]); ?>
              </div><?php endforeach; endif; ?>
              <div class="am-hide-sm-only am-u-md-6"></div>
            </div>


      <div class="am-g am-margin-top">
              <div class="am-u-md-2 am-text-right">
                路线
              </div>
              <div class="am-u-md-10 am-u-end col-end">
      <table class="table table-bordered table-condensed" style="margin-top:20px;" id="routetable">
        <thead>
          <tr>
            <th>
              站点顺序
            </th>
            <th>
              站点名称
            </th>
            <th>
              到站时间
            </th>
             <th>
              离站时间
            </th>
          
          </tr>
        </thead>
        <tbody> 
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
            <td>

            </td>
            <td>
            <?php echo ($vo["station_name"]); ?>
            </td>
            <td>
            <?php echo ($vo["drive_time"]); ?>
            </td>
            <td>
            <?php echo ($vo["arrival_time"]); ?>
            </td>
            
          </tr><?php endforeach; endif; ?>
        </tbody>
      </table>

            </div>
        
      </div>

        

    </div>
  </div>
  <!-- content end -->


        

</body>

</html>