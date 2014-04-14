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
        <!--[if lt IE 9]> 
       <script type="text/javascript" src="__PUBLIC__/js/html5shiv.js"></script>
       <script type="text/javascript" src="__PUBLIC__/js/respond.min.js.js"></script>
       <![endif]--> 
        <link href="__PUBLIC__/js/Metro/css/modern.css" rel="stylesheet">
        <link href="__PUBLIC__/js/Metro/css/modern-responsive.css" rel="stylesheet">
        <script type="text/javascript" src="__PUBLIC__/js/Metro/javascript/tile-slider.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/Metro/javascript/carousel.js"></script>
         <script type="text/javascript" src="__PUBLIC__/js/script.js" charset="utf-8"></script>
         
        
    <style type="text/css">
        .left{
            margin-left:20px;
        }
        .wiki-menu{
            position: fixed;
            top: 50px;
            padding:0px;
            border-radius: 6px 6px 6px 6px;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.067);
            background: #ffffff;
        }
        .wiki-menu li{
           
            width:200px;
            list-style: none outside none;
            border:1px solid #CCCCCC;
            height:30px;
            line-height:30px;
            position: relative;
        }
        .wiki-menu li:first-child{
            border-radius: 6px 6px 0 0;
        }
        .wiki-menu li:last-child{
            border-radius: 0 0 6px 6px;
        }
        .wiki-menu li a{
            padding-left: 20px;
            text-shadow: 0px 0.4px 0px rgba(0, 0, 0, 0.15);
            text-decoration: none;
        }
        .wiki-menu li a:hover{
            background:#CCCCCC;
            color:#FFFFFF;
        }
        .wiki-menu li i{
           position: absolute;
           left: 180px;
           top:5px;
        }
        .wiki-menu li a{
            display: block;
        }
        .content{
            margin-left: 270px;
            padding:20px;
            min-height: 465px;
        }
        .color-box span.color{
            display: inline-block;
            width:60px;
            height: 30px;
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
                 <li>
                     <a href="<?php echo U('Home/Wiki/index');?>">wiki</a>
                     <!--<a href="#">wiki</a>-->
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
                         <li><a href="__APP__/Home/Index/login">登录</a></li>
                         <li><a href="#">个人中心</a></li>
                         <li><a href="#">账号设置</a></li>
                         <li><a href="#">退出</a></li>
                     </ul>
                </li>
            </ul>
         </div>

     </div>
 </header>
   
     
    <div class="left pull-left mt20">
        <ul class="wiki-menu">
            <li><a href="#" class="active">常用颜色<i class="icon-chevron-right"></a></i></li>
           
            <li><a href="#"> 前端设计 <i class="icon-chevron-right"></a></i></li>
            <li><a href="#"> 前端设计 <i class="icon-chevron-right"></a></i></li>
            <li><a href="#"> 前端设计 <i class="icon-chevron-right"></a></i></li>
            <li><a href="#"> 前端设计 <i class="icon-chevron-right"></a></i></li>
            <li><a href="#"> 前端设计 <i class="icon-chevron-right"></a></i></li>
        </ul>
    </div>
    <div class="content mt20">
        <h3>常用颜色</h3>
        <div class="color-box">
            <span class="color" style=" background: #5C5C5C"></span> #5C5C5C
        </div>
    </div>
    <div class="clear"></div>


     <footer>
        <div class="friendly-link">
            友情链接：<a href="http://www.thinkphp.cn/" target="_bank"/>ThinkPHP官网
        </a>
         </div>
        <div class="copy_right">   
        &copy;Powered By 麦田麦穗 联系我：<a href="mailto:caowenpeng1990@126.com"/>caowenpeng1990@126.com</a>
        <span>
        	<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1000062499'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1000062499%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
        </span>
        </div>
 </footer>

   </body>
   </html>