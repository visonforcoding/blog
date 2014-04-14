<?php

class IndexAction extends PublicAction {

    public function __construct() {

        //var_dump($res);
        parent::__construct();
        $this->setUserSession();
    }

    /**
     * 显示首页
     */
    public function index() {
        $this->display();
       // $this->getAcessInfo();
    }

    /**
     * @return
     * 登录页
     * 
     */
    public function login() {

        $this->pageTitle = "猩球崛起";
        $this->bodyId = "login";
        $this->display('login');
    }

    /**
     * 处理登录页
     */
    public function dologin(){

        $username = $_POST['username'];
        $passwd = $_POST['passwd'];
        $passwd = md5($passwd);
        $rember =$_POST['rember'];
       // var_dump($rember);
       // exit();
        $user_tab = new UserModel();
        $res = $user_tab->field("id")->where("username ='{$username}' AND passwd = '{$passwd}'")->select();
        $num = $res[0]['id'];
        if($num <1){
            $this->error('用户名或密码不正确','login');
        }else{
          // if($rember =="on"){
            // setcookie('user',$username,time()+30*24*3600);
            //}else{
                session('user',$username);
                session('user_id',$num);
            //}

          $this->success('登录成功！','index');
        }

    }

    /**
     * 注册页
     */
    public function regisetr() {
        $this->bodyId = "register";
        $this->display('register');
    }

    /**
     *
     */
    public function doregister() {
        $username = $_POST['username'];
        $passwd = $_POST['passwd2'];
        $passwd = md5($passwd);
        $email = $_POST['email'];
        $cttime = time();
        $code = $_POST['vcode'];
        $code = md5($code);
        $vcode = $_SESSION['verify'];

        $data = array('username' => $username,
            'passwd' => $passwd,
            'email' => $email,
            'cttime'=>$cttime
        );

        $user_tab = new UserModel();
        $nums =$user_tab->where("username = '{$username}'")->count();
        $nums_email = $user_tab->where("email = '{$email}'")->count();
        if ($vcode == $code) {
            if ($nums !=0) {
                $this->error('该用户已存在！');
            }  else {
                if($nums_email !=0){
                    $this->error('该邮箱已被注册','register');
                }else{
                    $ins_res= $user_tab->add($data);
                    if($ins_res){
                        $this->success('注册成功！','index');
                    }else{
                        $this->error('发生未知错误','register');
                    }
                }
            }
        }else {
            $this->error('验证码错误！');    
        }
    }

    function getAcessInfo() {
        $ip = getIp();
        $address = getRealArea($ip);
        $data['ip'] = $ip;
        $data['country'] = $address['country'];
        $data['region'] = $address['region'];
        $data['city'] = $address['city'];
        $data['isp'] = $address['isp'];
        $data['cttime'] = time();
        $access_info_tab = new CommonModel('access_info');
        $access_info_tab->add($data);
    }

}