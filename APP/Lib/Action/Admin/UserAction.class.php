<?php

/*
 * Encoding     :   UTF-8
 * Created on   :   2013-7-16 22:30:46 by 麦田麦穗 , caowenpeng1990@126.com
 * For          :  用户管理模块
 */

class UserAction extends PublicAction {

    //用户管理
    public function __construct()
    {
        parent::__construct();
       $this->checkAdminSession();
    }
    public function adminManage() {
        //管理员管理
        $this->display('adminManage');
    }

    public function getAdmin() {
        $curPage = $_POST['page'];    //当前页
        $pageSize = $_POST['rows'];     //每页条数
        $admin_tab = new AdminModel();
        $res_json = $admin_tab->getAllJson($curPage, $pageSize);
        echo $res_json;
    }

    public function addAdmin() {
        //添加管理员
        $admin_tab = new AdminModel();
        $data['username'] = $_POST['uname'];
        $pwd = md5(I('param.pwd'));
        $data['pwd'] = $pwd;
        $data['email'] = $_POST['email'];
        $data['cttime'] = time();
        $admin_tab->insert($data);
    }

    public function delAdmin() {
        //删除管理员
        $admin_tab = new AdminModel();
        $id = $_POST['data'];
        //print_r($id);
        $admin_tab->delId($id);
        
    }

    public function updateAdmin() {
        $data = $_POST['data'];
        $ins_array = array();
        $id = $data[0]['id'];
        $ins_array['username']=$data[0]['username'];
        $pwd=$data[0]['pwd'];
        $pwd = md5($pwd);
        $ins_array['pwd']=$pwd;
        $ins_array['email']=$data[0]['email'];
        $ins_array['cttime']=time();
        $admin_tab = new AdminModel();
        $res=$admin_tab->updateAdmin($id,$ins_array);
        if($res){
            echo "更新成功！";
        }else{
            echo "更新失败";
        }

    }

    /**
     * @return string
     */
    public function ajaxtest(){
        $this->display('ajaxtest');
        $this->test = "just fffff";
        return "test";
    }

}

?>
