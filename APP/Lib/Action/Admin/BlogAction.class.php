<?php

class BlogAction extends PublicAction {
    

    //博文管理
    protected $Blog_tab;

    public function __construct() {
        parent::__construct();
        $this->Blog_tab = new BlogModel();
        $this->checkAdminSession();   //登录session 检测
    }

    public function addBlog() {
        //发布博文页
        $BlogCat_tab = new CommonModel('blog_cat');
        $res_category = $BlogCat_tab->select();
        if (isset($_GET['do'])) {
            if (isset($_GET['blog_id'])) {
                $id = $_GET['blog_id'];
                $res_content = $this->Blog_tab->field('content')->where("id = {$id}")->select();
                $content = $res_content[0]['content'];
                $this->content = $content;
            }
        }
        $this->category = $res_category;
        $upload = C('TMPL_PARSE_STRING.__UPLOAD__').'/';
        $RESOURCE = C('TMPL_PARSE_STRING.__RESOURCES__');
        $dirList = $this->getResource($RESOURCE);
        $this->assign('dirList',$dirList);
        $this->pic = $this->getPic($upload);
        $this->display('addBlog');
    }

    public function doAddBlog() {
        //处理发布博文
        $data['title'] = $_POST['title'];
        $data['author'] = $_POST['author'];
        $data['cat_id'] = $_POST['cat_id'];
        $data['cttime'] = time();
        $data['tag'] = $_POST['tag'];
        if(function_exists(get_magic_quotes_gpc)&&get_magic_quotes_gpc() ){
         $data['content'] =  stripslashes($_POST['content']) ;
         $data['pic'] = stripslashes( filter_input(INPUT_POST,'pic'));
        }else{
         $data['content'] = $_POST['content'];
         $data['pic'] = filter_input(INPUT_POST,'pic');
        }
        $data['summary'] = filter_input(INPUT_POST,'summary');
    
        if (isset($_GET['do'])) {
            if (isset($_GET['blog_id'])) {
                $id = $_GET['blog_id'];
                $res = $this->Blog_tab->where("id = {$id}")->save($data);
            }
        } else {
            $res = $this->Blog_tab->add($data);
        }

        //$sql =$this->Blog_tab->getLastSql();
        if ($res) {
            echo "操作成功！";
        } else {
            //var_dump($sql);
            echo "操作失败！";
        }
    }

    public function getBlog() {
        //获取博文资源
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res_blog = $this->Blog_tab->selByIdJson($id);
        } else {
            $curPage = $_POST['page'];    //当前页
            $pageSize = $_POST['rows'];     //每页条数
            $res_blog = $this->Blog_tab->getBlogJson($curPage, $pageSize);
        }

        //var_dump($res_blog);
        echo $res_blog;
    }

    public function manageBlog() {
        $this->display('manageBlog');
    }

    public function getBolgCat() {
        //获取博文类别
          $BlogCat_tab = new CommonModel('blog_cat');
        //$BlogCat_tab->getAllJson();
    }

    public function addCat() {  //添加类别
        $BlogCat_tab = new CommonModel('blog_cat');
        $cat = $_POST['category'];
        $map['category'] = $cat;
        $data['category'] = $cat;
        $data['describe'] = $_POST['describe'];
        $res = $BlogCat_tab->sel($map);
        if ($res) {
            echo "该类别已存在!";
            // var_dump($res);
        } else {
            $res_ins = $BlogCat_tab->add($data);
            if ($res_ins) {
                echo "添加成功！";
            } else {
                echo "添加失败！";
            }
        }
        //$test = new BlogModel();
        //$map['category']="程序人生";
        //$test->test($map);
    }

    public function delBlog() {
        $id = $_POST['data'];
        $this->Blog_tab->delId($id);
    }
    public function test() {
        $this->display('blog/test');
    }
    
    public function doImgUpload(){
     $resources = C('TMPL_PARSE_STRING.__RESOURCES__').'/';
     $root =   $_SERVER['DOCUMENT_ROOT'];
     $savePath = $root.$resources;
     //echo $savePath;
//     $root =   $_SERVER['DOCUMENT_ROOT'];
     Vendor('My.kindEditor.upload');
     $keUpload = new KeUpload($savePath,$resources); 
     $keUpload->upload();
     
    }
            
    
   

}
