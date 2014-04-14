<?php

/*
 * Encoding     :   UTF-8
 * Created on   :   2013-7-14 19:36:00 by 麦田麦穗 , caowenpeng1990@126.com
 * For          :
 */

class AdminModel extends Model
{

    //put your code here
    /**
     * @info    验证登录    返回用户ID
     * @param $admin
     * @param $pass
     * @return mixed
     */
    public function checkLogin($admin, $pass)
    {
        $pwd = md5($pass);
        $nums = $this->field('id')->where("username = '{$admin}' AND pwd = '{$pwd}'")->select();
        return $nums[0]['id'];
    }

    public function getAllJson($curPage, $pageSize)
    {
        //查找所有记录，返回jquery easy ui datagrid json 数据，用于jquery easy ui 分页显示
        $nums = $this->count(); //总条数
        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        $res = $this //->field("*,count(*) as count")
            //  ->join("left join log ON admin.id = log.user_id")
            ->limit($offset, $pageSize)->select();
        //$sql = "select * from `admin` left join `log` on `admin`.`id` = `log`.`user_id` limit $offset,$pageSize";
        // $res = $this->query($sql);
        foreach ($res as $key => $value) {
            //转换时间戳
            foreach ($value as $k => $v) {
                if ($k == "cttime" || $k == "last_login_time") {
                    $res[$key][$k] = date('Y-m-d H:i:s', $v);
                }
            }
        }
        $arr_json = array('total' => $nums, 'rows' => $res);
        $res_json = json_encode($arr_json);
        return $res_json;
    }

    public function insert($data)
    {
        //添加管理员
        $name = $data['username'];
        if ($this->sel($name)) {
            $res = $this->add($data);
            if ($res != FALSE) {
                echo "添加成功！";
            } else {
                echo "添加失败!";
            }
        } else {
            echo "该用户名已存在！";
        }
    }

    public function sel($name)
    {
        //按用户名查找，返回条数
        $nums_name = $this->where("username = '{$name}'")->count();
        if ($nums_name > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function delId($id)
    {
        $map['id'] = array('in', $id);
        $res_del = $this->where($map)->delete();
        if ($res_del != FALSE) {
            echo "删除成功！";
        } else {
            echo "删除失败";
        }
    }

    /**
     * @info  更新admin 信息
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updateAdmin($id, $data)
    {
        $res = $this->where("id = '{$id}'")->data($data)->save();
        return $res;
    }

}

?>
