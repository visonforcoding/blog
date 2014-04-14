<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
    
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="__PUBLIC__/js/jquery-easyui/themes/icon.css"></link>
        <link rel="stylesheet" href="__PUBLIC__/js/jquery-easyui/themes/bootstrap/easyui.css"></link> 
        <script src="__PUBLIC__/js/jquery-easyui/jquery.easyui.min.js"></script>
        <script src="__PUBLIC__/js/jquery-easyui/locale/easyui-lang-zh_CN.js"></script>
        <script type="text/javascript">
         function testAjax () {
         	$.ajax({
         		type:"POST",
         		url:"<?php echo U('Admin/user/test/');?>",
         	    data:"{'id':'test'}",
         	    success:function  (msg) {
         	    	alert(msg);
         	    }
         	})
         }
        </script>
    </head>
    <body>
    	<button id="test" type="button" onclick="testAjax();">test</button>
    </body>
 </html>