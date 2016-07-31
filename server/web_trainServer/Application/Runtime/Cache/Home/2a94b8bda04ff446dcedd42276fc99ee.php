<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>高铁驿站后台登录</title>

 	<link href="/Public/css/login.css" rel="stylesheet">

    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!--     <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="/Public/scripts/jquery.min.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script> -->
    <script type="text/javascript">
        
    </script>>


 </head>
 <body>
    
    <div class="top-cotent">
        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">

                        <div class="form-top">

                            <div class="form-top-left">
                                <h3>高铁方舟后台管理</h3>
                                <p>请输入管理员用户名和密码：</p>
                            </div>
                            
                            <div class="form-top-right">
                                <span class="glyphicon glyphicon-lock" style="font-size:70px"></span>
                            </div>
                        </div>

                        <div class="form-bottom">
                            <form class="login-form" role="form" action="<?php echo U('home/Index/login');?>" method="post">
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">管理员用户名</label>
                                    <input id="form-username" class="form-username form-control" type="text" name="username" placeholder="管理员用户名...">
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="form-password">管理员用户名</label>
                                    <input id="form-password" class="form-password form-control" type="password" name="password" placeholder="管理员密码...">
                                </div>

                                <button class="btn" type="submit" id="login">登录</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

 </body>
 </html>