<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-3-12 0:06:40 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   博问模块
 */
class AskAction extends PublicAction {

    public function __construct() {
        parent::__construct();
        $this->setUserSession();
    }

    public function index() {
        $rd = rand(1,1000);
        $this->assign('rd',$rd);
        $this->display();
    }
    
    public function  doAsk(){
        $Question = D('Question');
        if($Question->create()){
           if($Question->add()){
               $this->success('创建成功！');
           }else{
            echo $Question->getError();
           }
        }else{
       echo $Question->getError();
        }
    }

}
