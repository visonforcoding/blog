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
                /****启用kindEditor***/
                KindEditor.ready(function(K) {
                    window.editor = K.create('#editor', {
                        syncTyle: 'auto',
                        allowUpload : true, //允许上传图片
                        uploadJson : '__APP__/Admin/Blog/doImgUpload' //服务端上传图片处理URI
                    });
                });
                $('#addBlog').form({
                success: function(data) {
                    showMessage(data);
                }
                });
          <?php if (isset($_GET['do'])){ if ($_GET['do'] == "update"){ $id = $_GET['blog_id']; echo "$('#addBlog').form('load','__APP__/Admin/Blog/getBlog?id=$id');"; echo "$('#addBlog').attr('action','__APP__/Admin/Blog/doaddBlog?do=update&blog_id=$id');"; } } ?>
              $('#pic').on('click',function(){
                  $('#picBox').window('open');
              });
              $('.pic').on('click',function(){
                  var path = $(this).attr('src');
                   $('#pic').val(path);
                   $('.pic').css('background','transparent');
                   $(this).css('background','#005916');
              });
              
            });
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
            .curpostion{
                margin: 10px;
            }
            .mid-area{
                width: 600px;
                height: 100px;
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
                <li><a href="#">图书管理</a></li>
                <li class="active">添加图书</li>
            </ul>
        </div>
          <div class="content">
            <form id="addBlog" action="__APP__/Admin/Book/doAddBook" method="post" >
                <div class="control-group">
                    <label  for="name">书名</label>
                    <input  type="text" id="title" style="width:400px;" name="name" placeholder="书名">
                </div>
                 <div class="control-group">
                    <label  for="name">短书名</label>
                    <input  type="text" id="title" style="width:300px;" name="shortname" placeholder="短书名">
                </div>
                <div class="control-group">
                    <label  for="author">作者</label>
                        <input type="text" id="author" name="author" placeholder="作者">
                </div>
                  <div class="control-group">
                    <label  for="cat_id">分类</label>
                        <select name = "cat_id">
                            <?php if(is_array($bookCat)): foreach($bookCat as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["category"]); ?></option><?php endforeach; endif; ?>
                        </select>
                        <a href="__APP__/Admin/Blog/manageBlog">+添加新分类</a>
                    </div>
                   <div class="control-group">
                    <label  for="admire">编辑推荐</label>
                        <textarea name="admire" class="mid-area" id="admire"></textarea>
                    </div>
                <div class="control-group">
                   <label  for="pic">封面</label>
                        <input type="text" style="width:300px;" name="pic" id="pic"/>
                   </div>
              <div id="picBox" class="easyui-window" title="封面选择" 
                     data-options="iconCls:'icon-save',modal:true,closed:true"  style="width:700px;height:500px;">
                    <?php if(is_array($pic)): foreach($pic as $key=>$vo): ?><img src="<?php echo ($vo); ?>" class="pic" alt="pic"/><?php endforeach; endif; ?>
             <div  class="toolbar" style="text-align:right">
                <a href="#" class="easyui-linkbutton" iconCls="icon-save" onclick="javascript:$('#picBox').window('close')">确定</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#picBox').window('close')">取消</a>
             </div>
               </div>
                <div class="control-group">
                    <label for="download">下载地址</label>
                    <input type="text" style="width:300px;" name="download" id="download"/>
                </div>
                <div class="control-group">
                    <label for="code">提取密码</label>
                    <input type="text"  name="code" id="code"/>
                </div>
                <div class="control-group">
                    <label class="control-label" for="summary">导言</label><BR>
                    <div class="editorBox">
                        <textarea id="editor" name="summary" style="width:100%;height:400px;">
                                 <?php if(isset($_GET['do'])){ if(isset($_GET['blog_id'])){ echo $content; } } ?>    
                        </textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label></label>
                    <button type="submit" class="btn ">确认发布</button>
                </div>
            </form>
        </div>

        </div>
    </div>

</body>
</html>