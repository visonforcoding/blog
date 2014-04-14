<?php

class BlogModel extends CommonModel
{
    public function getBlogJson($curPage, $pageSize)
    {
        //查找所有记录，返回jquery easy ui datagrid json 数据，用于jquery easy ui 分页显示
        $nums = $this->count(); //总条数
        $offset = ($curPage - 1) * $pageSize; //分页起始条数
        $res = $this->field('blog.*,blog.id as blog_id,blog_cat.category')->join('blog_cat ON blog.cat_id = blog_cat.id')->limit($offset, $pageSize)->select();
        foreach ($res as $key => $value) {
            //转换时间戳
            foreach ($value as $k => $v) {
                if ($k == "cttime") {
                    $res[$key][$k] = date('Y-m-d H:i:s', $v);
                }
                if ($k == "content") {
                    $content = strip_tags($v);
                    $res[$key][$k] = mb_substr($content, 0, 30, "utf-8");
                }
            }
        }
        //$sql = $this->getLastSql();
        $arr_json = array('total' => $nums, 'rows' => $res);
        $res_json = json_encode($arr_json);
        return $res_json;
        //return $res;

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

    public function selByIdJson($id)
    {
        //获取form json 用于jquery easyui from 填充
        $arr_json = array();
        $res = $this->field('blog.*,blog.id as blog_id,blog_cat.category')
                ->join('blog_cat ON blog.cat_id = blog_cat.id')
                ->where("blog.id = $id")
                ->select();
        foreach ($res as $value) {
            $arr_json = $value;
        }
        $res_json = json_encode($arr_json);
        echo $res_json;
    }
}