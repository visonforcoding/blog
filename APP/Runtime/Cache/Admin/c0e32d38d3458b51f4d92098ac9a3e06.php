<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>后台管理</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
        <link href="__PUBLIC__/css/adminlogin.css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="__PUBLIC__/js/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="__PUBLIC__/js/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript">

            $(function() {
                $('form').submit(function() {
                    if ($('#username').val() == '') {
                        alert('用户名不能为空！');
                        return false;
                    }
                    if ($('#passwd').val() == '') {
                        alert('密码不能为空！');
                        return false;
                    }
                    if ($('#vcode').val() == '') {
                        alert('验证码不能为空');
                        return false;
                    }
                    if ($('#vcode').val() == '') {
                        alert('验证码不能为空');
                        return false;
                    }
                });
            })



        </script>
        <style>
            .login_top{
                line-height: 32px;
            }
            #login_img{
                width:130px;
                position:relative;
                top:-150px;
                left: 350px;
            }
        </style>
    </head>
    <body>
        <div class='back_index'>
            <a href='' title='返回网站首页'><img src='__PUBLIC__/img/logo/return-back.png' /></a>
        </div>
        <div id="login-box">
            <div class="login_top">
                <strong style="font-size: 20px">管理登录</strong>

            </div>
            <div class="login_main">
                <form action="<?php echo U('Admin/index/authLogin/');?>" method="post">
                    <table>
                        <tr>
                            <td>用户名：</td>
                            <td><input id="username" type="text" name="username"/></td>
                        </tr>
                        <tr>
                            <td>密码：</td>
                            <td><input type="password" id="passwd" name="passwd"/></td>
                        </tr>
                        <tr>
                            <td>验证码：</td>
                            <td><input type="text" id="vcode" name="vcode" style="width:75px;"/>
                                <span style="margin-bottom: 0px;"><img style="vertical-align:top; border: 1px solid #0066cc" src="__APP__/Admin/Index/verify/" alt="点击图片刷新.."  title="点击图片刷新" onclick="this.src = '__APP__/admin/index/verify/id/' + Math.random() + '/'"/></span></td>
                        </tr>
                        <tr><td><input type="reset" class="btn btn-primary" value="重置"/></td><td><input class="btn btn-primary" type="submit" value="登录"/></td></tr>
                    </table>
                </form>
            </div>
            <div id="login_img">
                <img src='__PUBLIC__/img/logo/admin.jpg'/>
            </div>
            <div class="login_power">
                Powered by:<a href="#" target="blank">麦田麦穗</a>&nbsp;QQ：348462402&copy;2010-2012
            </div>
        </div>
    </body>
</html>