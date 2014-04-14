<?php

return array(
    //'配置项'=>'配置值'
    'VERSION' => '201402171627', //开发版本
    'APP_GROUP_LIST' => 'Home,Admin,Mobile', //项目分组设定
    'DEFAULT_GROUP' => 'Home', //默认分组
    'DEFAULT_MODULE' => 'blog', //设置默认控制器
    'URL_CASE_INSENSITIVE' => true,
    'URL_HTML_SUFFIX' => 'html', //伪静态化
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_DSN' => 'mysql://root:348462402@localhost:3306/tp_test',
    //'DB_DSN' => 'mysql://wdnrnsg8xr_vison:aFumInV9Vc@localhost:3306/wdnrnsg8xr_vison',
    'SHOW_PAGE_TRACE' => true, // 显示页面Trace信息
    'URL_MODEL' => '2', // 路由模式
    'URL_HTML_SUFFIX' => '',
    'COOKIE_PREFIX' => '', //cookie  前缀
    //'SESSION_AUTO_START' =>false  //禁止自动启动session
    //'LAYOUT'=>true,
    //'LAYOUT_NAME'=>'Layout/layout'
    // 'TMPL_ENGINE_TYPE' =>'php',
    'TMPL_EXCEPTION_FILE' => './App/Tpl/Public/error.html', // 定义公共错误模板
    'TMPL_L_DELIM' => '{',
    'TMPL_R_DELIM' => '}',
    'TMPL_PARSE_STRING' => array(
        '__PUBLIC__' => __ROOT__ . '/Public', // 更改默认的__PUBLIC__ 替换规则
        '__JS__' => '/Public/JS/', // 增加新的JS类库路径替换规则
        '__UPLOAD__' => __ROOT__ . '/Uploads', // 增加新的上传路径替换规则
        '__RESOURCES__' => __ROOT__ . '/Resources'
    ),
    'TOKEN_ON' => true, // 是否开启令牌验证
    'TOKEN_NAME' => '__hash__', // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE' => 'md5', //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET' => true, //令牌验证出错后是否重置令牌 默认为true
    //错误跳转对应的模板文件
    'TMPL_ACTION_ERROR' => THINK_PATH . 'Tpl/dispatch_jump.tpl',
    //成功跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => THINK_PATH . 'Tpl/dispatch_jump.tpl',
);
