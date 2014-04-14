<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>后台管理</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="shortcut icon" href="__PUBLIC__/img/favicon.ico">
        <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="__PUBLIC__/js/jquery-easyui/themes/icon.css"/>
        <link rel="stylesheet" href="__PUBLIC__/js/jquery-easyui/themes/bootstrap/easyui.css"/> 
        <script src="__PUBLIC__/js/jquery-easyui/jquery.easyui.min.js"></script>
        <script src="__PUBLIC__/js/jquery-easyui/locale/easyui-lang-zh_CN.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/kindeditor/kindeditor.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/kindeditor/lang/zh_CN.js"></script>
        <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.2/js/bootstrap.min.js"></script>
        <script src="__PUBLIC__/js/admin.js"></script>
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/admin.base.css"/>
    
    <script type="text/javascript">
        $(function() {
            $('#dg').datagrid({
                url: "<?php echo U('Admin/Blog/getBlog/');?>",
                //url: "__APP__/Admin/User/getAdmin",
                pagination: true,
                rownumbers: true, //显示行号
                columns: [[
                        {field: 'ck', checkbox: true},
                        {field: 'title', title: '文章标题'},
                        {field: 'author', title: '作者', width: 100},
                        {field: 'category', title: '标签'},
                        {field: 'cttime', title: '创建时间', width: 198},
                        {field: 'content', title: '文章内容', width: 300},
                        {field: 'action', title: "操作", width: 100, formatter: function(value, row, index) {
                                return "<a href='__APP__/Admin/Blog/addBlog?do=update&blog_id=" + row.blog_id + "'>编辑</a>";
                            }}
                    ]]
            });
            $('#addCat_form').form({
                onSubmit: function() {
                    var isValid = $(this).form('validate');
                    if (!isValid) {
                        showMessage('类别名不能为空！');
                    }
                    return isValid;
                },
                success: function(data) {
                    showMessage(data);
                    //$('#dlg1').dialog('close');
                    //$('#dg').datagrid('load');
                }
            });
            $('#category').validatebox({
                required: true
            });
        });
        function del() {
            var ss = [];
            var rows = $('#dg').datagrid('getSelections');
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                ss.push(row.id);
            }
            ;
            $.messager.confirm('Confirm', '确定要删除记录?', function(r) {
                if (r) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo U('Admin/Blog/delBlog/');?>",
                        data: {"data[]": ss},
                        success: function(msg) {
                            showMessage(msg);
                            $('#dg').datagrid('load', {
                            });
                        }
                    });
                }
            });
        }
        function showMessage(msg) {
            $.messager.show({
                title: "提示信息",
                msg: msg,
                timeout: 2000,
                showType: 'show',
                style: {
                    right: 0,
                    left: '',
                    top: parent.document.body.scrollTop + parent.document.documentElement.scrollTop,
                    bottom: ''
                }
            });
        }
    </script>

    
    <style type="text/css">

    </style>

</head>
<body>
    <div id="top">
        <nav class="navbar navbar-default navbar-inverse" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="__APP__/Home/Blog/Index">小绾的博客</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
          <li class="divider"></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user"></span>
                         <?php echo ($user); ?>
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="__APP__/Admin/Index/logout">退出</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
    </div>
    <div id="center">
        <div id="left">
            <div class="left-top">
                <div class="left-top_unit front"><a href="__APP__/Home/Index/inex">
                        <span class="glyphicon glyphicon-home"></span> 网站首页</a></div>
                <div class="left-top_unit"><a href="__APP__/Admin/Index/admin"> 
                        <span class="glyphicon glyphicon-align-justify"></span> 管理首页</a></div>
                <div class="clear"></div>
            </div>
            <div class="left-menu">
                <ul class="menu">
                    <li class="toggle"><a href="javascript:void(0);">
                            <span class="glyphicon glyphicon-cog"></span> 系统设置</a>
                        <ul class="toggle-menu">
                            <li><a href="__APP__/Admin/Index/sysinfo" target="_blank">系统信息</a></li>
                            <li><a>常规设置</a></li>
                        </ul>
                    </li>
                    <li class="toggle"><a href="javascript:void(0);">
                            <span class="glyphicon glyphicon-user"></span> 用户管理</a>
                        <ul class="toggle-menu">
                            <li><a href="__APP__/Admin/User/adminManage">管理员管理</a></li>
                            <li><a>会员管理</a></li>
                        </ul>
                    </li>
                    <li class="toggle"><a href="javascript:void(0);">
                            <span class="glyphicon glyphicon-list-alt"></span> 博文管理</a>
                        <ul class="toggle-menu">
                            <li><a href="__APP__/Admin/Blog/addBlog/">发布博文</a></li>
                            <li><a href="__APP__/Admin/Blog/manageBlog/">博文管理</a></li>
                        </ul>
                    </li>
                    <li class="toggle"><a href="javascript:void(0);">
                            <span class="glyphicon glyphicon-book"></span> 图书管理</a>
                        <ul class="toggle-menu">
                            <li><a href="__APP__/Admin/Book/addBook/">添加图书</a></li>
                            <li><a>图书管理</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div id="right">
        
    <div class="curpostion">
        <ul class="breadcrumb">
            <li><a href="#">后台管理</a> <span class="divider"></span></li>
            <li><a href="#">博客管理</a> <span class="divider"></span></li>
            <li class="active">文章管理</li>
        </ul>
    </div>
    <div >
        <div class="data-grid">
            <div id="tb">  
                <a href="<?php echo U('Admin/Blog/addBlog/');?>" class="easyui-linkbutton" iconCls="icon-add" plain="true">发布博文</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="del();">删除博文</a>
                <a href="__APP__/Admin/Blog/addBlog?do=update&blog_id=" class="easyui-linkbutton" iconCls="icon-edit" plain="true">修改博文</a>  
                <a href="#" class="easyui-linkbutton" iconCls="icon-redo" plain="true" onclick="cancelEdit()">取消</a> 
                <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="saveEdit();">保存</a>  
            </div> 
            <table id="dg">

            </table>
        </div>
        <div id="addCategory">
            <form id="addCat_form" action="<?php echo U('Admin/Blog/addCat');?>" method="POST">
                <p><label>添加分类</label><input type="text" name="category" id="category"/></p>
                <p><label>分类描述</label>
                    <textarea id="describe" name="describe" style="width:600px;height:100px;"></textarea></p>
                <p><label></label><button type="submit" class="btn btn-primary">确认添加</button></p>    
            </form>
        </div>
    </div>


        </div>
    </div>

</body>
</html>