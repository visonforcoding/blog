<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WikiAction extends PublicAction {

    public function __construct() {

        //var_dump($res);
        parent::__construct();
        $this->setUserSession();
    }

    /**
     * 显示首页
     */
    public function index() {
        $this->pageTitle ="Wiki";
        $this->display();
       // $this->getAcessInfo();
    }

  
}