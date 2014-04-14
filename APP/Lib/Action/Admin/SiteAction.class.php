<?php

/**
 * @author 麦田麦穗
 * @info 网站系统信息 访问信息
 */
class SiteAction extends PublicAction {

    /**
     * @info 网站访问信息
     */
    public function __construct() {
        parent::__construct();
        $this->checkAdminSession();
    }

    public function accessInfo() {
        $this->display('Site/accessInfo');
    }

    /**
     * @info 获取访问信息表
     */
    public function getInfo() {
        $curPage = $_POST['page'];    //当前页
        $pageSize = $_POST['rows'];     //每页条数
        $info_tab = new Access_infoModel();
        $order = array('cttime' => 'desc');
        $res_json = $info_tab->getAllJson($curPage, $pageSize, $order);
        //$sql = $info_tab->getLastSql();
        //var_dump($sql);
        //var_dump($res_json);
        echo $res_json;
    }

}
