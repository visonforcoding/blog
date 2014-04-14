<?php

/*
 * Encoding     :   UTF-8
 * Created on   :   2013-7-13 19:40:49 by 麦田麦穗 , caowenpeng1990@126.com
 * For          :
 */

class CommonModel extends AdvModel
{
    //put your code here
    public function fetchAll()
    {
        $res = $this->select();
        foreach ($res as $key => $value) {
              foreach($value as $k => $v){
                  if($k == "cttime"){
                      $res[$key][$v]=date('Y-m-d H:i:s',$v);
                  }

              }
        }
        return $res;
    }

    public function getAllJson($curPage, $pageSize, $order = '')
    {
        //查找所有记录，返回jquery easy ui datagrid json 数据，用于jquery easy ui 分页显示
        $nums = $this->count(); //总条数
        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        if (!empty($order)) {
            $res = $this->limit($offset, $pageSize)->order($order)->select();
        } else {
            $res = $this->limit($offset, $pageSize)->select();
        }
        foreach ($res as $key => $value) {
            //转换时间戳
            foreach ($value as $k => $v) {
                if ($k == "cttime") {
                    $res[$key][$k] = date('Y-m-d H:i:s', $v);
                }
            }
        }
        $arr_json = array('total' => $nums, 'rows' => $res);
        $res_json = json_encode($arr_json);
        return $res_json;
    }
    
    /**
     * 按字段查找 
     * @param type $map
     * @return $res 返回记录数
     */
    public function sel($map){
       $res = $this->where($map)->count();
       return $res;
    }

}

