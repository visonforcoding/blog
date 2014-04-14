<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-9-20
 * Time: 下午6:09
 * To change this template use File | Settings | File Templates.
 */
class TestAction extends  PublicAction{
  public function index(){
      /*  setcookie('fuck','操',time()+3600);
        $fuck = $_COOKIE['fuck'];
        echo $fuck;
        exit();*/
      $admin_tab = new AdminModel();
      $res = $admin_tab->getAllJson(1,3);
      $sql = $admin_tab->getLastSql();
      var_dump($res);
     // var_dump($sql);
      exit();

    }

    public function two(){
        $content = "<b>test中文乱码</b>";
        $this->sendEmail('348462402@qq.com','主题么',$content);
        exit();
    }
}