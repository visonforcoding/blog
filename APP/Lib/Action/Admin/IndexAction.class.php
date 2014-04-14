<?php

/*
 * Encoding     :   UTF-8
 * Created on   :   2013-7-10 21:38:47 by 麦田麦穗 , caowenpeng1990@126.com
 * For          :   后台登陆处理
 */

class IndexAction extends PublicAction {

    public function index() {
        //后台登录页
   
        $this->display('adminLogin');
    }

    public function verify() {
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }

    public function authLogin() {
        //验证登录
        if (!IS_POST){
            halt("页面不存在！");
        }
        $admin = filter_input(INPUT_POST, 'username');
        $pass = $_POST['passwd'];
        $admin_tab = new AdminModel();
        $log_tab = new LogModel();   // 日志表
        $res = $admin_tab->checkLogin($admin, $pass);  //返回用户Id
        $code = $_POST['vcode'];
        $code = md5($code);
        if ($code == $_SESSION['verify']) {
            if ($res > 0) {
               session('admin',$admin);  //设置 管理员名session
               session('adminId',$res);
               $time = time();
                $ip = get_client_ip();    //内部函数返回IP地址
                $data = array(
                    'user_id'=>$res,
                    'last_login_time'=>$time,
                    'last_login_ip'=>$ip
                );
                //$admin_tab->updateAdmin($res,$data);
                $log_tab->add($data);   //更新日志表
                $this->success('登录成功！', 'admin');

            } else {
                $this->error('登录失败', 'index');
            }
        }else{
          $this->error('验证码错误','index');
        }
   
    }

    public function admin() {
        $this->checkAdminSession();
        $session_admin = session('admin');
        $this->session_admin = $session_admin;
        $ip = getIp();
        $today = date('Y年m月d日');
        $weekarray=array("日","一","二","三","四","五","六");
        $weekday = $weekarray[date('w')];
        $address = getRealArea($ip);
        $country = $address['country'];
        $region = $address['region'];
        $city = $address['city'];
        $net = $address['isp'];
        $version = C('VERSION');
        $this->version = $version;
        $this->ip = $ip;
        $this->address = $country.$region.$city.$net;
        $this->today = $today.'星期'.$weekday;
        $this->display('index');
    }
    /**
     * 退出登录
     */
    public function logout(){
        session('admin',null);
        $this->success('退出成功！','index');
    }
    /**
     * 
     */
    public function sysinfo(){
        
        phpinfo();
    }
    public function dbtest() {
        //$admin_tab = new CommonModel('admin');
        //$res = $admin_tab->fetchAll();
        //var_dump($res);
        //test test
        $this->admin();
        $this->test();
    }

}


