<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns:wb=“http://open.weibo.com/wb”>
    <head>
        <title><?php echo ($pageTitle); ?></title>
        <meta name="keywords" content="PHP，java，C语言，web开发，代码分享" />
        <meta name="description" content="小绾博客为个人IT博客致力于提供IT类心得分享，资料分享，代码分享。"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="   __PUBLIC__/js/bootstrap/css/bootstrap.css">
        <link href="__PUBLIC__/css/flat-ui1.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/base.css">
        <script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/bootstrap/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="__PUBLIC__/js/jquery.scrollUp.min.js"></script>
       
        <link href="__PUBLIC__/js/Metro/css/modern.css" rel="stylesheet">
        <link href="__PUBLIC__/js/Metro/css/modern-responsive.css" rel="stylesheet">
        <script type="text/javascript" src="__PUBLIC__/js/Metro/javascript/tile-slider.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/Metro/javascript/carousel.js"></script>
         <script type="text/javascript" src="__PUBLIC__/js/script.js" charset="utf-8"></script>
        
	<script type="text/javascript">
	  $(function(){
          $("#cat_tab a:first").tab('show');
    /*$('#username').keyup(function(){
          var username = $('#username').val();
          // alert(username);
         /* regx = /(^d+$)|(^[a-zA-Z]+$)/;
          var check = regx.test(username);
          if(check){
          	$('#username').tooltip(option);
          	$('#username').tooltip('show');
          }else{
          	alert('ff');
          }
        })*/
	  });
	</script>

        
	<style type="text/css">
	  body{
	  	padding-bottom: 41px;

	  }
	  #register-block{
	  	margin-left: 400px;
	  	border: 1px solid rgb(196, 198, 202);
	  	padding: 20px;
	  	box-shadow: 3px 3px #EDEFF1;
	  	border-radius: 5px;
	  }
	  #register-block label{
	  	display: inline-block;
	  	width: 150px;
	  	text-align: right;
	  	vertical-align:top;
	  }
      .question-box{
     border:1px solid rgb(196, 198, 202);
          padding: 10px;
          border-radius: 5px;;
      }
      input[type="radio"]{
          margin-left: 20px;
      }
	  footer{
	  	position: fixed;
	  	bottom: 0;
	  }
	</style>

     </head>
    <body id="<?php echo ($bodyId); ?>">
      <header class="navbar navbar-fixed-top navbar-inverse">
     <div class="navbar-inner">
         <div class="container">
             <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
             </a>
         </div>
       
         <div class="nav-collapse collapse" style="margin-left:120px">
             <ul class="nav">
                 <li>
                     <a href="<?php echo U('Home/Index/index');?>">首页</a>
                 </li>
                 <li class="divider-vertical"></li>
                 <li>
                     <a href="<?php echo U('Home/Blog/index');?>">博文</a>
                 </li>
                 <li>
                     <a href="#">资源</a>
                 </li>
                <li>
                     <a href="#">爱读书</a>
                 </li>
                   <li>
                     <a href="#">Fun</a>
                 </li>
                 <li>
                     <a href="#">小应用</a>
                 </li>
     
             </ul>
         </div>
         <div id="user-box"  class="nav-collapse collapse pull-right">
            <ul class="nav">
                <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <i class="icon-user icon-white"></i>
                        <?php echo ($user); ?>
                         <b class="caret"></b>
                     </a>
                     <ul class="dropdown-menu">
                         <li><a href="#">个人中心</a></li>
                         <li><a href="#">账号设置</a></li>
                         <li><a href="#">退出</a></li>
                     </ul>
                </li>
            </ul>
         </div>

     </div>
 </header>
     
	<div class="container mt10">
		<div class="pull-left">
		   <div class="question-box">
               <ul class="nav nav-tabs" id="cat-tab">
                   <li class="active"><a href="#home" data-toggle="tab">WEB前端</a></li>
                   <li><a href="#profile" data-toggle="tab">php</a></li>
                   <li><a href="#messages" data-toggle="tab">python</a></li>
                   <li><a href="#settings" data-toggle="tab">C#</a></li>
               </ul>
               <div id="question-content" class="tab-content">
                   <div class="tab-pane active" id="home">
                     请听题：哪款浏览器最让前端程序员蛋疼？
                       <p>
                           <input name="one-a"  type="radio"/>chrome
                           <input  name="one-a" type="radio"/>IE
                           <input  name="one-a" type="radio"/>firefox
                       </p>
                   </div>
                   <div class="tab-pane" id="profile">...</div>
                   <div class="tab-pane" id="messages">...</div>
                   <div class="tab-pane" id="settings">...</div>
               </div>
		   </div>
		</div>
		<div id="register-block">
			<div id="register-form">
				<form action="__APP__/Home/Index/doregister" method="post">
				<div class="form-row">
					<label for="username">用户名：</label>
					<input name="username" data-toggle="tooltip" required="" id="username" type="text" placeholder="输入用户名"/>
				</div>
				<div class="form-row">
					<label for="passwd">密码：</label>
					<input name="passwd" type="password" required="" placeholder="密码"/>
				</div>
					<div class="form-row">
					<label for="passwd">确认密码：</label>
					<input name="passwd2" type="password" required="" placeholder="确认密码"/>
				</div>
				<div class="form-row">
					<label for="email">Email：</label>
					<input name="email"  required=""  type="email" placeholder="邮箱用于找回密码"/>
				</div>
				<div class="form-row">
					<label for="vcode">验证码：</label>
					<input name="vcode" type="text" required="" placeholder="证明你不是机器人"/>
					<img style="vertical-align:top; border: 1px solid #0066cc" src="__APP__/Admin/Index/verify" alt="点击图片刷新.."  title="点击图片刷新" onclick="this.src = '__APP__/admin/index/verify/id/' + Math.random() + '/'"/>
				</div>
				<div class="form-row">
					<label></label>
					<button class="btn" type="submit">提交</button>
				</div>
           <a href="#" data-toggle="tooltip" title="first tooltip">hover over me</a>
				</form>
			</div>
		</div>
	</div>

     <footer>
        <div class="friendly-link">
            友情链接：<a href="http://www.thinkphp.cn/" target="_bank"/>ThinkPHP官网
        </a>
         </div>
        <div class="copy_right">   
        &copy;Powered By 麦田麦穗 联系我：<a href="mailto:caowenpeng1990@126.com"/>caowenpeng1990@126.com</a>
        <span>
        <!--	<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1000062499'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1000062499%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>-->
        </span>
        </div>
 </footer>
   </body>
   </html>