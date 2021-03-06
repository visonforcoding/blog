<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/js/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="__PUBLIC__/js/jquery-easyui/themes/icon.css"/>
    <link rel="stylesheet" href="__PUBLIC__/js/jquery-easyui/themes/bootstrap/easyui.css"/>
    <script src="__PUBLIC__/js/jquery-easyui/jquery.easyui.min.js"></script>
    <script src="__PUBLIC__/js/jquery-easyui/locale/easyui-lang-zh_CN.js"></script>
    <style>
            *{
                margin: 0;
                padding: 0;
            }
        </style>
    <script>
            $(function() {
                $('#dg').datagrid({
                    url: "<?php echo U('Admin/Site/getInfo');?>",
                    pagination: true,
                    rownumbers: true, //显示行号
                    columns: [[
                            {field: 'ck',checkbox:true},
                            {field:'ip',title:'ip'},
                            {field:'net',title:'网络'},
                            {field:'region',title:'地区'},
                            {field:'country',title:'国家'},
                            {field:'city',title:'城市'},
                            {field:'cttime',title:'访问时间'}
                        ]]
                });
            });
              
            function showMessage(msg) {
                   $.messager.show({
                    title:"提示信息",
                    msg:msg,
                    timeout:3000,
                    showType:'show',
                    style:{
                     right:0,
                     left:'',
                     top:document.body.scrollTop+document.documentElement.scrollTop,
                     bottom:''
                     }
                   })
                }
     
        </script></head>
<body>
    <div id="tb">
        <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="$('#dlg1').dialog('open');">添加管理员</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="delAdmin();">删除用户</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editAdmin();">编辑用户</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-redo" plain="true" onclick="cancelEdit()">取消</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="saveEdit();">保存</a>
    </div>
    <table id='dg'></table>
</body>
</html>