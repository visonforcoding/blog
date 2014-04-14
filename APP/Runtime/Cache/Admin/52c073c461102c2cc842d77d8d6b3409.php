<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/js/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="__PUBLIC__/js/jquery-easyui/themes/icon.css"/>
        <link rel="stylesheet" href="__PUBLIC__/js/jquery-easyui/themes/bootstrap/easyui.css"/> 
        <script src="__PUBLIC__/js/jquery-easyui/jquery.easyui.min.js"></script>
        <script src="__PUBLIC__/js/jquery-easyui/locale/easyui-lang-zh_CN.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/kindeditor/kindeditor.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/kindeditor/lang/zh_CN.js"></script>
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/admin.base.css"/>
        
     <script type="text/javascript">
            $(function() {
                KindEditor.ready(function(K) {
                    window.editor = K.create('#editor', {
                        syncTyle: 'auto'
                    });
                });
            });
      </script>

        
    </head>
    <body>
    
    ff
    <textarea id="editor"></textarea>

    </body>
</html>