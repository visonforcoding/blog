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
      <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=183637053" type="text/javascript" charset="utf-8"></script>
         <script type="text/javascript" src="__PUBLIC__/js/script.js" charset="utf-8"></script>
        
     </head>
     <body>
		 <header class="navbar navbar-fixed-top navbar-inverse">
     <div class="navbar-inner">
         <div class="container">
             <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
             </a>
         </div>
    <a class="brand" style="float:right" href="/">Bootstarp</a>
       <div class=".nav-collapse.collapse" style="margin-left:120px">
             <ul class="nav">
                 <li>
                     <a href="<?php echo U('Home/Index/index');?>">首页</a>
                 </li>
                 <li>
                     <a href="#">博文</a>
                 </li>
                 <li>
                     <a href="#">资源</a>
                 </li>
             </ul>
         </div>
    <div class="btn-group ">
    <a class="btn btn-primary btn-inverse" href="#"><i class="icon-user icon-white"></i> User</a>
    <a class="btn btn-primary btn-inverse dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
    <ul class="dropdown-menu">
    <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
    <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
    <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
    <li class="divider"></li>
    <li><a href="#"><i class="i"></i> Make admin</a></li>
    </ul>
    </div>


     </div>
 </header>

        <div class="container">
            <div class="center">
                <div class="center_left">
                   <div id="blog_box">
    <h4 style="border-bottom:1px dashed #008ED5;"><?php echo ($pageTitle); ?></h4>
    <div class="blog_info">
        <dd>
            <span style="color:green">分类：</span>
            <?php echo ($category); ?>
            <span style= "color:green;margin-left:10px;">标签：</span>
            <?php echo ($tag); ?>
            <span style= "color:green;margin-left:10px;">作者：</span>
            <?php echo ($author); ?>
            <span style= "color:green;margin-left:10px;">发布时间：</span>
            <?php echo ($cttime); ?>
        </dd>
        <div id="blog_text"><?php echo ($content); ?></div>
        <div class="share_bar">
            <span class="pull-right">
                <script type="text/javascript" charset="utf-8">
(function(){
  var _w = 106 , _h = 58;
  var param = {
    url:location.href,
    type:'5',
    count:'1', /**是否显示分享数，1显示(可选)*/
    appkey:'183637053', /**您申请的应用appkey,显示分享来源(可选)*/
    title:'', /**分享的文字内容(可选，默认为所在页面的title)*/
    pic:'', /**分享图片的路径(可选)*/
    ralateUid:'1327127031', /**关联用户的UID，分享微博会@该用户(可选)*/
    language:'zh_cn', /**设置语言，zh_cn|zh_tw(可选)*/
    dpc:1
  }
  var temp = [];
  for( var p in param ){
    temp.push(p + '=' + encodeURIComponent( param[p] || '' ) )
  }
  document.write('<iframe allowTransparency="true" frameborder="0" scrolling="no" src="http://service.weibo.com/staticjs/weiboshare.html?' + temp.join('&') + '" width="'+ _w+'" height="'+_h+'"></iframe>')
})()
</script>
     </span>
     <div class="clear"></div>       
        </div>
        <div class="blog_menu mt20">
            <dd>上一篇：<?php echo ($prev); ?></dd>
            <dd>下一篇：<?php echo ($next); ?></dd>
        </div>
    </div>
</div>
<div id="comment_form" class="mt20">
    <div style="width:650px">
        <div class="left title">我来说几句</div>
        <div id="input_notice" class="right">
            您还可以吐槽
            <span id="input_nums">150</span>
            字。
        </div>
        <div class="clear"></div>
    </div>
    <dd>
        <textarea id="comment" style="width:650px;height:100px;">我来说几句。</textarea>
    </dd>
    <button id="sub_comment" type="submit" class="btn btn-min btn-primary">确认吐槽</button>
</div>
<div id="comment" class="mt20 border_gray">
    <div class="comment_unit">
        <div class="comment_box to">
            <div class="comment_face left">
                <img src="__PUBLIC__/img/face/face_1.jpg"/>
            </div>
            <div class="comment_content">是么</div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="comment_unit">
        <div class="comment_box to">
            <div class="comment_face left">
                <img src="__PUBLIC__/img/face/face_3.jpg"/>
            </div>
            <div class="comment_content">是么</div>
            <div class="clear"></div>
        </div>
    </div>

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
            </div>
        </div>
        <footer>
        <div class="friendly-link">
            友情链接：<a href="http://www.thinkphp.cn/" target="_bank"/>ThinkPHP官网
        </a>
         </div>
        <div class="copy_right">   
        &copy;Powered By 麦田麦穗 联系我：<a href="mailto:caowenpeng1990@126.com"/>caowenpeng1990@126.com</a>
        </div>
 </footer>
   </body>
   </html>