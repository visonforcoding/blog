<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns:wb=“http://open.weibo.com/wb”>
    <head>
        <title><?php echo ($pageTitle); ?></title>
        <meta name="keywords" content="PHP，java，C语言，web开发，代码分享" />
        <meta name="description" content="小绾博客为个人IT博客致力于提供IT类心得分享，资料分享，代码分享。"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" href="__PUBLIC__/img/favicon.ico">
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
        <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=183637053" type="text/javascript" charset="utf-8"></script>
         <script type="text/javascript" src="__PUBLIC__/js/script.js" charset="utf-8"></script>
         
    <script type="text/javascript" src="__PUBLIC__/js/syntax/scripts/shCore.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/syntax/scripts/shAutoloader.js"></script>
    <link type="text/css" rel="stylesheet" href="__PUBLIC__/js/syntax/styles/shThemeRDark.css"/>
    <script type="text/javascript">
        $(function() {
            SyntaxHighlighter.autoloader.apply(null, path(
                    'applescript            @shBrushAppleScript.js',
                    'actionscript3 as3      @shBrushAS3.js',
                    'bash shell bsh         @shBrushBash.js',
                    'coldfusion cf          @shBrushColdFusion.js',
                    'cpp c                  @shBrushCpp.js',
                    'c# c-sharp csharp      @shBrushCSharp.js',
                    'css                    @shBrushCss.js',
                    'delphi pascal          @shBrushDelphi.js',
                    'diff patch pas         @shBrushDiff.js',
                    'erl erlang             @shBrushErlang.js',
                    'groovy                 @shBrushGroovy.js',
                    'java                   @shBrushJava.js',
                    'jfx javafx             @shBrushJavaFX.js',
                    'js jscript javascript  @shBrushJScript.js',
                    'perl pl                @shBrushPerl.js',
                    'php                    @shBrushPhp.js',
                    'text plain             @shBrushPlain.js',
                    'py python              @shBrushPython.js',
                    'ruby rails ror rb      @shBrushRuby.js',
                    'sass scss              @shBrushSass.js',
                    'scala                  @shBrushScala.js',
                    'sql                    @shBrushSql.js',
                    'vb vbnet               @shBrushVb.js',
                    'xml xhtml xslt html    @shBrushXml.js'
                    ));
            SyntaxHighlighter.defaults['toolbar'] = false;
            SyntaxHighlighter.config.bloggerMode = true;
            SyntaxHighlighter.all();   //开启sh
            $('#comment').val('');   //评论域清空
            /*********滚动条事件************/
            $(window).scroll(function() {
                var scrollBar = document.documentElement.scrollTop;
                // var top = document.body.scrollHeight;
                // alert(top);
                if (scrollBar < 50) {
                    $('#scrollUp').css('display', 'none');
                } else {
                    $('#scrollUp').show();
                }
            }
            );
 
//            $('#sub_comment').click(function() {
//                var comment = $('#comment').val();
//                var user = "<?php echo ($user); ?>";
//                var user_id = "<?php echo ($user_id); ?>";
//                var blog_id = "<?php echo ($blog_id); ?>";
//                if (user !== "登录") {
//                    $.ajax({
//                        type: 'POST',
//                        url: "__APP__/Home/Blog/addComment",
//                        data: {'user_id': user_id, 'blog_id': blog_id, 'comment': comment},
//                        success: function(msg) {
//                            if (msg) {
//                                $('#sub_response').html("评论成功！");
//                                $('#sub_response').slideDown('fast', function() {
//                                    setTimeout("$('#sub_response').slideUp('fast')", 1000);
//                                });
//                            }
//                        }
//                    });
//                } else {
//                    $('#sub_response').html('请先登录');
//                    $('#sub_response').slideDown('fast', function() {
//                        setTimeout("$('#sub_response').slideUp('fast')", 1000);
//                    });
//
//                }
//
//            });
        });
        function path()
        {
            var args = arguments,
                    result = [];
            for (var i = 0; i < args.length; i++)
                result.push(args[i].replace('@', '__PUBLIC__/js/syntax/scripts/'));

            return result;
        }
    </script>

        
    <style title="text/css">
        .center_left{
            background: #ffffff;
        }
        .date{
            background: url('__PUBLIC__/images/sprite.png') bottom left no-repeat;
            float: left;
            margin-left: -40px;
            padding-bottom: 14px;
            width: 100px;

        }
        .date p{
            background: #eb374b;
            color: #fff;
            font-family: Arvo, Cambria, Georgia, Times, serif;
            font-size: 0.75em;
            line-height: 1;
            margin-bottom: 0;
            padding: 12px 10px;
            text-align: right;
            text-transform: uppercase;
        }
        .date .day{
            clear: both;
            display: block;
            font-size: 1.6875em;
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
                     <a href="#">首页</a>
                      <!--<a href="<?php echo U('Home/Index/index');?>">首页</a>-->
                 </li>
                 <li class="divider-vertical"></li>
                 <li>
                     <a href="<?php echo U('Home/Blog/index.html');?>">博文</a>
                 </li>
                <li>
                     <a href="<?php echo U('Home/Book/index.html');?>">爱读书</a>
                 </li>
                 <li>
                     <a href="#">小应用</a>
                 </li>
                 <li>
                     <a href="<?php echo U('Mobile/Blog/index.html');?>">移动端</a>
                 </li>
                 <li>
                     <a href="__APP__/Home/Ask/index.html">博问</a>
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
   
      <div class="container">
            <div class="center">
                <div class="center_left">
                   
    <div id="blogBoxTop"></div>
    <div id="blog_box">
        <div id="wrapper">
            <div class="date">
                <p>
                    <span class="day"><?php echo ($day); ?></span>
                    <?php echo ($year); ?>/<?php echo ($month); ?>
                </p>
            </div> 
            <div class="blog_title" style="border-bottom:1px dashed #008ED5;"><?php echo ($pageTitle); ?></div>
            <div class="blog_info">
                <p>
                    <span style="color:green"><i class="icon-folder-open"></i> 分类:</span>
                    <?php echo ($category); ?>
                    <span style= "color:green;margin-left:10px;"><i class="icon-tag"></i>  标签:</span>
                    <?php echo ($tag); ?>
                    <span style= "color:green;margin-left:10px;"><i class="icon-bookmark"></i> 作者:</span>
                    <?php echo ($author); ?>
                    <span style= "color:green;margin-left:10px;"><i class="icon-leaf"></i> 阅读次数:</span>
                    (<?php echo ($count); ?>)
                </p>
                <div id="blog_text"><?php echo ($content); ?></div>
                <div class="share_bar">
                    <span class="pull-right">
                        <script type="text/javascript" charset="utf-8">
                            (function() {
                                var _w = 106, _h = 58;
                                var param = {
                                    url: location.href,
                                    type: '5',
                                    count: '1', /**是否显示分享数，1显示(可选)*/
                                    appkey: '183637053', /**您申请的应用appkey,显示分享来源(可选)*/
                                    title: '', /**分享的文字内容(可选，默认为所在页面的title)*/
                                    pic: '', /**分享图片的路径(可选)*/
                                    ralateUid: '1327127031', /**关联用户的UID，分享微博会@该用户(可选)*/
                                    language: 'zh_cn', /**设置语言，zh_cn|zh_tw(可选)*/
                                    dpc: 1
                                };
                                var temp = [];
                                for (var p in param) {
                                    temp.push(p + '=' + encodeURIComponent(param[p] || ''))
                                }
                                document.write('<iframe allowTransparency="true" frameborder="0" scrolling="no" src="http://service.weibo.com/staticjs/weiboshare.html?' + temp.join('&') + '" width="' + _w + '" height="' + _h + '"></iframe>')
                            })();
                        </script>
                    </span>
                    <div class="clear"></div>
                </div>
                <div class="blog_menu mt20">
                    <dd>上一篇：<?php echo ($prev); ?></dd>
                    <dd>下一篇：<?php echo ($next); ?></dd>
                </div>
            </div>

            <!--对话框 -->
            <div id="sub_response" class="myModal">

            </div>
            <!--end-->
        </div>
    </div>
                <!--  评论区 -->
            <div class="comment_part mt20">
                <?php if(empty($res_comment)): ?><div>
                        还没有任何评论哦(☆_☆)/~~
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
          <!-- end 评论区-->
    <div class="title">我来说几句</div>
    <div id="comment_form">
        <form action="__APP__/Home/Blog/blogRead?id=<?php echo ($id); ?>" method="post">
                <input type="hidden" name="blog_id" value="<?php echo ($id); ?>" />
            <p class="form_unit">
                <label>昵称：</label>
                <input type="text" required="required" id="nick" name="nick"/>
            </p>
            <p class="form_unit">
                <label>邮箱：</label>
                <input type="email" required="required" id="email" name="email"/>
            </p>

            <div class="form_unit form_comment">
                <p><label class="left">评论：</label>
                <div id="input_notice" class="right">
                    您还可以吐槽
                    <span id="input_nums">150</span>
                    字。
                </div>
                <div class="clear"></div>
                </p>
                <textarea class="right" id="comment" name="comment" placeholder="我来说几句"></textarea>
            </div>
            <button id="sub_comment" type="submit" class=" mt20 btn btn-min btn-primary right">确认吐槽</button>
            <div class="clear"></div>
        </form>
    </div>


                </div>
                <div class="center_right"> 
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
                     <?php if(is_array($res_blogCat)): foreach($res_blogCat as $key=>$vo): ?><li><a href="__APP__/Home/Blog/index/category/<?php echo ($vo["id"]); ?>.html"><span class="cat_name"><?php echo ($vo["category"]); ?></span></a>
                        <span class="blog_nums">(<?php echo ($vo["count(*)"]); ?>)</span></li><?php endforeach; endif; ?>
                </ul>
 </div>
  <h4 style="line-height:20px;height:20px;border-bottom:1px dashed #F5F5F5;  ">文章标签</h4>
 <div id="tag_box">
     <?php if(is_array($res_tag)): foreach($res_tag as $key=>$vo): $ran= array_rand($tag_color); $color =$tag_color["$ran"]; $pad = mt_rand(0,10); $mag = mt_rand(1,5); ?>
        <span class="label <?php echo ($color); ?>" style="padding:<?php echo ($pad); ?>px;margin:<?php echo ($mag); ?>px;"><?php echo ($vo["tag"]); ?></span><?php endforeach; endif; ?>
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

   </body>
   </html>