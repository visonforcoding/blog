<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($pageTitle); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="__PUBLIC__/img/favicon.ico">
        <link rel="stylesheet" href="__PUBLIC__/js/jquery-mobile/jquery.mobile-1.4.0.css" />
        <script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/jquery-mobile/jquery.mobile-1.4.0.min.js"></script>
        <style type="text/css">
            .ui-footer .ui-title{
                padding: 0px;
            }
            
   .ui-listview > li p{
     white-space: normal;
     width: 80%;     
    } 

        </style>
    </head> 
</head>
<body>
    <header>
        
        <div data-role="header" data-theme="b" data-position="fixed">
            <a href="__APP__/Home/Blog/index" rel="external" data-icon="home" >小绾</a>
            <a href="#popupMenu" data-rel="popup" data-transition="slideup" class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-grid">View</a>
            <span class="ui-title"></span>
            <div data-role="popup" id="popupMenu" data-theme="b">
        <ul data-role="listview" data-inset="true" style="min-width:210px;">
            <li data-role="list-divider">按类别显示</li>
            <?php if(is_array($res_blogCat)): foreach($res_blogCat as $key=>$v): ?><li><a rel="external" href="__APP__/Mobile/Blog/index/category/<?php echo ($v["id"]); ?>"><span class="cat_name">
                        <?php echo ($v["category"]); ?></span><span class="blog_nums">(<?php echo ($v["count(*)"]); ?>)</span></a>
                  </li><?php endforeach; endif; ?>
        </ul>
</div>
        </div>

    </header>

    <ul data-role="listview" data-inset="true">
        <?php if(is_array($res_blog)): foreach($res_blog as $key=>$v): ?><li data-role="list-divider"><?php echo ($v["title"]); ?><span class="ui-li-count">阅读（<?php echo ($v["count"]); ?>）</span></li>
            <li><a rel="external" href="__APP__/Mobile/Blog/blogRead/id/<?php echo ($v["blog_id"]); ?>">
                    <h2><?php echo ($v["author"]); ?></h2>
                    <p><?php echo ($v["content"]); ?>......</p>
                    <p class="ui-li-aside"><strong><?php echo ($v["cttime"]); ?></strong></p>
                </a>
            </li><?php endforeach; endif; ?>
       
    </ul>

<div data-role="footer" data-theme="b"  data-position='fixed' >
    <h1>&COPY; Copyright 麦田麦穗</h1>
</div><!-- /header -->
</body>
</html>