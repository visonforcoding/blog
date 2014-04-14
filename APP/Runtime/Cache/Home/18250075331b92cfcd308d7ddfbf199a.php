<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns:wb=“http://open.weibo.com/wb”>
    <head>
        <title><?php echo ($pageTitle); ?></title>
        <meta name="keywords" content="PHP，java，C语言，web开发，代码分享" />
        <meta name="description" content="小绾博客为个人IT博客致力于提供IT类心得分享，资料分享，代码分享。"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta property="wb:webmaster" content="43fff287e345a618" />
        <link href="__PUBLIC__/css/flat-ui1.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="   __PUBLIC__/js/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/base.css">
       <!--[if lt IE 9]> 
       <script type="text/javascript" src="__PUBLIC__/js/html5shiv.js"></script>
       <script type="text/javascript" src="__PUBLIC__/js/respond.min.js.js"></script>
       <![endif]--> 
        <script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
         <script type="text/javascript" src="__PUBLIC__/js/bootstrap/js/bootstrap.min.js">
         </script>
        <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=183637053" type="text/javascript" charset="utf-8"></script>
      <script type="text/javascript" src="__PUBLIC__/js/script.js" charset="utf-8"></script>
        <style type="text/css">
         body{
            background: url("__PUBLIC__/images/wood.jpg") repeat scroll 0% 0% transparent;
         }
         #top{
            height:200px;
           /* background: url("__PUBLIC__/img/index_top/top_bg.jpg");*/
            background-size: 960px 200px;
         }

         .blog_box{
            padding: 10px;
            background:#EDF4F3;
            margin-bottom: 5px;
            border-radius: 10px;
         }
         .blog_text{
            margin: 5px;
            padding: 10px;
            line-height: 30px;
         }
         .blog_text:first-letter{
            font-size: 24px;
            font-weight: bold;
         }
         span.time{
            font-family: '新蒂小丸子';
            color: #a9a9a9;
            margin-left:10px;
         }
         
         #user_img{
            margin: 10px auto auto 20px;
            display:inline-block;
           
            padding:5px;
         }
         #user_img:hover{
           
         }
         .cat_ul li{
            list-style-type: none;
         }
         span.cat_name{
            display: inline-block;
            width: 120px;
            text-align: right;
         }
        
         </style>
    </head>
    <body>
    <!--导航条-->
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
   
    <!--内容-->
    <div class="container">
       <div class="top">
            <div id="top_title">
            <h2>你是我心内的一道光....</h2>
            </div>
        <div id="top_show">
        <img src="__PUBLIC__/img/index_top/word.jpg"/>
        </div>
        </div>
      <div class="center">
        <div class="center_left">
            <?php if(is_array($res_blog)): foreach($res_blog as $key=>$v): ?><div class="blog_box">
                    <h4><i class="icon-tags"></i> <a href="__APP__/Home/Blog/blogRead?id=<?php echo ($v["blog_id"]); ?>"><?php echo ($v["title"]); ?></a></h4>
                    <h4><span class="time month"><?php echo ($v["month"]); ?></span><span class="time day"><?php echo ($v["day"]); ?></span><span class="time year"><?php echo ($v["year"]); ?></span></h4>
                     <dd><span style="color:green">分类：</span><?php echo ($v["category"]); ?>
                         <span style= "color:green;margin-left:10px;">标签：</span>
                         <?php echo ($v["tag"]); ?>
                         <span style= "color:green;margin-left:10px;">作者：</span>
                         <?php echo ($v["author"]); ?>
                     </dd>
                     <div class="blog_text">
                          <?php echo ($v["content"]); ?>...[<a href="__APP__/Home/Blog/blogRead?id=<?php echo ($v["blog_id"]); ?>">阅读全文</a>]
                     </div>
                </div><?php endforeach; endif; ?>
            <div class="pagination"><ul><?php echo ($show); ?></ul></div>
        </div>
    <div class="center_right">
       <!-- 右侧栏目-->
           <div class="user_box">
                <div class="user_img">
                    <span id="user_img"><img  src="__PUBLIC__/img/logo/user.jpg"></span>
                </div>
                <div class="user_info" >
                    <dd>昵称：小绾~</dd>
                  <dd><wb:follow-button uid="1327127031" type="red_2" width="136" height="24" ></wb:follow-button></dd>
                </div>
</div>
<div class="cat_box">
                 <h4 style="line-height:20px;height:20px;border-bottom:1px dashed #F5F5F5;  ">博文分类</h4>
                 <ul class="cat_ul">
                     <?php if(is_array($res_blogCat)): foreach($res_blogCat as $key=>$vo): ?><li><span class="cat_name"><?php echo ($vo["category"]); ?></span>
                        <span class="blog_nums">(<?php echo ($vo["count(*)"]); ?>)</span></li><?php endforeach; endif; ?>
                </ul>
 </div>
  <h4 style="line-height:20px;height:20px;border-bottom:1px dashed #F5F5F5;  ">文章标签</h4>
 <div id="tag_box">
     <?php if(is_array($res_tag)): foreach($res_tag as $key=>$vo): $ran= array_rand($tag_color); $color =$tag_color["$ran"]; $pad = mt_rand(0,10); $mag = mt_rand(1,5); ?>
        <span class="label <?php echo ($color); ?>" style="padding:<?php echo ($pad); ?>px;margin:<?php echo ($mag); ?>px;"><?php echo ($vo["tag"]); ?></span><?php endforeach; endif; ?>
 </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <!--底部文件-->
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