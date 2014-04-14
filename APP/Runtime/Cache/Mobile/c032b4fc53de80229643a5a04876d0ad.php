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
            
        </style>
    </head> 
</head>
<body>
    <header>
        
    <div data-role="header" data-theme="b"  data-position='fixed'>
      <a href="__APP__/Mobile/Blog/index" rel="external" data-role="button" data-icon="back" class='ui-btn-left' >返回</a>
      <h1><?php echo ($pageTitle); ?></h1>
      <a href="__APP__/Mobile/Blog/index" data-role="button" data-icon="heart" class='ui-btn-right'>赞</a>
    </div><!-- /header -->

    </header>

    <div class="ui-content">
        <p class="author">作者/<?php echo ($author); ?></p>
        <?php echo ($content); ?>
    </div>

<div data-role="footer" data-theme="b"  data-position='fixed' >
    <h1>&COPY; Copyright 麦田麦穗</h1>
</div><!-- /header -->
</body>
</html>