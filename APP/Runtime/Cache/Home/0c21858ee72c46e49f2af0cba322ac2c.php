<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns:wb=“http://open.weibo.com/wb”>
    <head>
        <title><?php echo ($pageTitle); ?></title>
        <meta name="keywords" content="<?php echo (($seo_keywords)?($seo_keywords):'PHP，web开发，代码分享，电子书下载'); ?>" />
        <meta name="description" content="<?php echo (($seo_description)?($seo_description):'小绾博客为个人IT博客致力于提供IT类心得分享，资料分享，代码分享，电子书分享。'); ?>"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" href="__PUBLIC__/img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/js/bootstrap/css/bootstrap.css">
        <link href="__PUBLIC__/css/flat-ui1.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/base.css">
        <!--[if lt IE 9]> 
       <script type="text/javascript" src="__PUBLIC__/js/html5shiv.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/respond.min.js.js"></script>
        <![endif]--> 
        <script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/bootstrap/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="__PUBLIC__/js/jquery.scrollUp.min.js"></script>
        <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=183637053" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="__PUBLIC__/js/script.js" charset="utf-8"></script>
    
    
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
                     <a href="#">首页</a>
                      <!--<a href="<?php echo U('Home/Index/index');?>">首页</a>-->
                 </li>
                 <li class="divider-vertical"></li>
                 <li>
                     <a href="<?php echo U('Home/Blog/index');?>">博文</a>
                 </li>
                <li>
                     <a href="<?php echo U('Home/Book/index');?>">爱读书</a>
                 </li>
                 <li>
                     <a href="#">小应用</a>
                 </li>
                 <li>
                     <a href="<?php echo U('Mobile/Blog/index');?>">移动端</a>
                 </li>
             </ul>
         </div>
         <div id="user-box"  class="nav-collapse collapse pull-right">
            <ul class="nav">
                <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <i class="icon-user icon-white"></i>
                         <?php echo (($user)?($user):'游客'); ?>
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
   

           <div class="book_top">
        <div class="top_wrap">
            <div class="book_logo">爱读书</div>
            <div class="top_search">
                <form action="__APP__/Home/Book/search" method="get">
                    <input type="text" name="keywords" placeholder="书名 关键字" />
                    <input class="search_bt btn"  type="submit" value="搜索" />
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="center">
            <div class="center_left">
                <div class="book_serch">
                <?php if(is_array($book)): foreach($book as $key=>$v): ?><div class="book_search_unit">
                        <div class="pull-left">
                    <img  src="<?php echo ($v["pic"]); ?>" class="book_ul" title="<?php echo ($v["name"]); ?>"/>
                        </div>
                        <div class="pull-left">
                            <p class="book_name">
                            <h5> <a href="__APP__/Home/Book/book/id/<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a></h5>
                            </p>
                            <p class="book_author">
                                <span class="info_tag">作者：</span> <?php echo ($v["author"]); ?>
                            </p>
                            <p class="book_cat"><span class="info_tag">所属类别：</span><?php echo ($v["category"]); ?></p>
                            <p class="book_admire"><span class="info_tag">推荐导读：</span><?php echo ($v["admire"]); ?></p>
                        </div>
                    <div class="clear"></div>
                    </div><?php endforeach; endif; ?>
                </div>
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
        	<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1000062499'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1000062499%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
        </span>
        </div>
 </footer>
<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"></a>
</body>
</html>