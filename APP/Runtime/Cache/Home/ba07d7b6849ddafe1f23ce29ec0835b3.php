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
    
    <style type="text/css">
        .book_image{
            float: left;
        }
        .book_image img{
            width: 220px;
            height: 250px;
        }
        .book_box .book_describe{
            float: left;
            width:450px;
        }
        .book_box .book_describe .info_tag{
            margin-right: 5px;
            color: #666;
        }
        .bookComment_box{
            margin-top: 30px;
        }
        textarea{
            border: 1px solid rgba(0,0,0,0.4);
        }
       .comment_form input{
            border: 1px solid rgba(0,0,0,0.4);
        }
    </style>

    
    <script type="text/javascript">
        $(function() {
            $('#down').tooltip();
            $('#down').on('click', function() {
                var id = "<?php echo ($book["id"]); ?>";  //Book Id
                var down = "<?php echo ($book["down"]); ?>"; //book 下载数
                var data = {'id': id, 'down': down};
                $.ajax({
                    type: "post",
                    url: "__APP__/Home/Book/down",
                    data: data,
                    success: function(msg) {
                        alert(msg);
                    }
                });
            });
        });
    </script>

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
                <div class="book_box">
                    <div class="book_image">
                        <img src="<?php echo ($book["pic"]); ?>" title="<?php echo ($book["name"]); ?>" alt="<?php echo ($book["name"]); ?>"/>
                    </div>
                    <div class="book_describe">
                        <h3><?php echo ($book["name"]); ?></h3>
                        <p><span class="info_tag">作者</span><?php echo ($book["author"]); ?></p>
                        <p class="book_summary"><?php echo ($book["summary"]); ?></p>
                        <p class="down_bar mt10">
                            <a href="#" id="praise" title="觉得不错就点赞吧！" class="btn btn-primary pull-left">
                                <i class="icon-heart icon-white"></i>赞(<?php echo ($book["praise"]); ?>) 
                            </a>
                            <a id="down" href="<?php echo ($book["download"]); ?>" data-toggle="tooltip" 
                               data-original-title="下载提取码<?php echo ($book["code"]); ?>"
                               data-placement="right"
                               class="btn btn-primary pull-right">
                                <i class="icon-download icon-white"></i>下载电子书(<?php echo ($book["down"]); ?>)</a>
                        </p>
                    </div>
                    <div class="clear"></div>
                    <div><wb:share-button appkey="ifga9" addition="number"
                                          default_text="免费下载《<?php echo ($book["name"]); ?>》PDF版，很不错哦！"                  
                                          type="button" ralateUid="1327127031"></wb:share-button>
                        <script type="text/javascript">
                            setQzoneBtn();
                            loadQzoneScript();
                        </script>
                    </div>
                </div>
                <div class="bookComment_box">
                    <div class="comment_box">
                        <?php if(empty($res_comment)): ?><div class="comment_null">
                                还没有任何人发表评论。
                            </div><?php endif; ?>
                        <?php if(is_array($res_comment)): foreach($res_comment as $key=>$v): ?><div class="comment_unit">
                                <div class="comment_box to">
                                    <div class="comment_face left">
                                        <?php $rand = mt_rand(1,8); ?>
                                        <img src="__PUBLIC__/img/face/face_<?php echo ($rand); ?>.jpg"/>
                                    </div>
                                    <div class="comment_content">
                                        <div class="comment_nick"><?php echo ($v["nick"]); ?>说： <span class="right"><?php echo ($v["cttime"]); ?></span></div>
                                        <div class="comment_con">
                                            <?php echo ($v["content"]); ?>
                                        </div>
                                        <div class="comment_info">来自：<?php echo ($v["country"]); ?> <?php echo ($v["region"]); ?> <?php echo ($v["city"]); ?> <?php echo ($v["net"]); ?> </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div><?php endforeach; endif; ?>
                    </div>
                    <div class="comment_form">
                        <p><h4>发表新的回复</h4></p>
                    <form action="__APP__/Home/Book/book/id/<?php echo ($book["id"]); ?>" method="post"
                        <p class="mt10"><label>邮箱:</label><input type="email" name="email" /></p>
                        <p><label>昵称:</label><input type="text" name="nick"  /></p>
                        <p class="mt10">
                            <label>评论：</label>
                            <textarea name='comment' style="width:100%;height: 70px;"></textarea></p>
                        <p class="pull-right">
                            <button type="submit" class="btn btn-small">加上去...</button></p>
                    </form>
                    </div>
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