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
    
    <script>
        $(function() {
            $.extend($.fn.validatebox.defaults.rules, {
                price: {
                    validator: function(value) {
                        return /^d+.d{2}$/.test(value);
                    },
                    message: '输入格式不对！'
                },
                minLength: {
                    validator: function(value, param) {
                        return value.length >= param[0];
                    },
                    message: '请输入至少{0}个字符.'
                },
                pwdMatch: {
                    validator: function(value) {
                        return value == $('#pwd').val();
                    },
                    message: "两次输入密码不匹配！"
                }
            });
            $('#dg').datagrid({
                url: "<?php echo U('Admin/User/getAdmin/');?>",
                //url: "__APP__/Admin/User/getAdmin",
                pagination: true,
                rownumbers: true, //显示行号
                columns: [[
                        {field: 'ck', checkbox: true},
                        {field: 'username', title: '用户名', width: 100,
                            editor: {
                                type: 'validatebox',
                                options: {
                                    valueField: 'username',
                                    required: true
                                }
                            }},
                        {field: 'cttime', title: '创建时间', width: 200},
                        {field: 'email', title: '邮箱', width: 200,
                            editor: {
                                type: 'validatebox',
                                options: {
                                    valueField: 'username',
                                    required: true,
                                    validType: "email"
                                }}
                        },
                        {field: 'last_login_time', title: '上次登录时间'},
                        {field: 'last_login_ip', title: '上次登录IP'},
                        {field: 'count', title: '登录次数'}


                    ]]
            });
            $('#addAdmin').form({
                onSubmit: function() {
                    var isValid = $(this).form('validate');
                    if (!isValid) {
                        alert('输入有错误！');
                    }
                    return isValid;
                },
                success: function(data) {
                    showMessage(data);
                    $('#dlg1').dialog('close');
                    $('#dg').datagrid('load');
                }
            });
            $('#uname').validatebox({
                required: true
            });
            $('#pwd').validatebox({
                required: true,
                validType: 'minLength[6]'
            });
            $('#pwd2').validatebox({
                required: true,
                validType: "pwdMatch"
            });
            $('#email').validatebox({
                validType: "email"
            });
        });
        function updateActions(index) {
            $('#dg').datagrid('updateRow', {
                index: index,
                row: {}
            });
        }
        function delAdmin() {
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
                        url: "<?php echo U('Admin/user/delAdmin/');?>",
                        data: {"data[]": ss},
                        success: function(msg) {
                            showMessage(msg);
                            $('#dg').datagrid('load', {
                            });
                        },
                    });
                }
            });
        }
        function showMessage(msg) {
            $.messager.show({
                title: "提示信息",
                msg: msg,
                timeout: 3000,
                showType: 'show',
                style: {
                    right: 0,
                    left: '',
                    top: document.body.scrollTop + document.documentElement.scrollTop,
                    bottom: ''
                }
            })
        }
        function editAdmin() {
            $('#dg').datagrid('beginEdit', getIndex());
        }
        function getIndex() {
            // 获取行索引
            var row = $('#dg').datagrid('getSelected');
            var index = $('#dg').datagrid('getRowIndex', row);
            return index;
        }
        function saveEdit() {
            $('#dg').datagrid('endEdit', getIndex());
            var updated = $('#dg').datagrid('getChanges', 'updated');
            if (updated.length) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo U('Admin/user/updateAdmin/');?>",
                    data: {"data": updated},
                    success: function(msg) {
                        showMessage(msg);
                        $('#dg').datagrid('refreshRow', getIndex());
                    },
                });
            } else {
                showMessage("您未更新任何数据！");
            }

        }
        function cancelEdit() {
            //取消编辑
            $('#dg').datagrid('cancelEdit', getIndex());
        }
    </script>

    
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .form_span{
            display:inline-block;
            width: 70px;
            text-align: right;
        }
        #addAdmin dd{
            margin-top:10px;
            height:30px;
            line-height:30px;
        }
        #addAdmin input{
            height:20px;
            width: 150px;
        }
        .input_info{
            color:  #ff3333;
        }

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
            <li><a href="#">后台管理</a> </li>
            <li><a href="#">用户管理</a></li>
            <li class="active">管理员管理</li>
        </ul>
    </div>
    <div id="tb">  
        <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="$('#dlg1').dialog('open');">添加管理员</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="delAdmin();">删除用户</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editAdmin();">编辑用户</a>  
        <a href="#" class="easyui-linkbutton" iconCls="icon-redo" plain="true" onclick="cancelEdit()">取消</a> 
        <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="saveEdit();">保存</a>  
    </div>  
    <table id='dg'>
    </table>
    <div id="dlg1" class="easyui-dialog" title="添加管理员" style="width:420px;height:290px;padding:10px"
         data-options="
         iconCls: 'icon-save',
         toolbar: '#dlg-toolbar',
         buttons: '#dlg-buttons',
         closed: 'true'
         ">
        <div id='form_box'>
            <form id='addAdmin' action="<?php echo U('Admin/user/addAdmin/');?>" method="post">
                <dd><span class='form_span'>用户名：</span><input type="text" id='uname' name="uname"/><span class="input_info">（*必填项）</span></dd>
                <dd><span class='form_span'>密码：</span><input type="password" id='pwd' name="pwd"/><span class="input_info">（*不得少于6位）</span></dd>
                <dd><span class='form_span'>确认密码：</span><input type="password" id='pwd2' name="pwd2"/><span class="input_info">（*）</span></dd>
                <dd><span class='form_span'>邮箱：</span><input type="text" id='email' name="email"/></dd>
                <dd><span class='form_span'></span><button class="btn btn-primary" type="submit">确认添加</button></dd>
            </form>
        </div>
    </div>

        </div>
    </div>

</body>
</html>