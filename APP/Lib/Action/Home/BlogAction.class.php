<?php

// 本类由系统自动生成，仅供测试用途
class BlogAction extends PublicAction {

    public function __construct() {
        parent::__construct();
        $this->setUserSession();
    }

    public function index() {
        $this->pageTitle = "小绾的博客|情感抒发|编程语言|WEB开发|PHP";
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        }
        $blog_tab = new BlogModel();
        Vendor('My.page.Page');      //导入我的分页类
        //查询总条数  和 博文资源
        if (!empty($category)) {
           $nums=  $blog_tab->field('*,blog.id as blog_id')
                    ->join("right join blog_cat ON blog.cat_id = blog_cat.id")
                    ->where("blog.cat_id = blog_cat.id AND blog_cat.id=$category")
                    ->order('cttime desc')
                    ->count(); //总条数
        } else {
            $nums = $blog_tab->field('*,blog.id as blog_id')
                    ->join("right join blog_cat ON blog.cat_id = blog_cat.id")
                    ->where('blog.cat_id = blog_cat.id')
                    ->order('cttime desc')
                    ->count(); //总条数
        }
        $page = new MyPage($nums, 5);
        $Model = new Model();
        if (!empty($category)) {
              $querySql = "SELECT blog.*,blog.id as blog_id,blog_cat.*,count(comm.id) "
                    . "AS comment FROM `blog` "
                    . "left join blog_cat ON blog.cat_id = blog_cat.id "
                    . "left join (select * from comment where category = 'blog')"
                    . " AS comm ON blog.id = comm.union_id"
                    . " WHERE ( blog.cat_id = blog_cat.id AND blog_cat.id = '$category'  )"
                    . " GROUP BY blog.id ORDER BY blog.cttime desc LIMIT 0,5";
              
        } else {
            $querySql = "SELECT blog.*,blog.id as blog_id,blog_cat.*,count(comm.id) "
                    . "AS comment FROM `blog` "
                    . "left join blog_cat ON blog.cat_id = blog_cat.id "
                    . "left join (select * from comment where category = 'blog')"
                    . " AS comm ON blog.id = comm.union_id"
                    . " WHERE ( blog.cat_id = blog_cat.id  )"
                    . " GROUP BY blog.id ORDER BY blog.cttime desc LIMIT 0,5";
            
        }
        $res_blog = $Model->query($querySql);
        foreach ($res_blog as $key => $value) {
            foreach ($value as $k => $v) {
                if ($k == 'cttime') {
                    $res_blog[$key]['cttime'] = date("Y-m-d H:i:s", $v);
                    $res_blog[$key]['year'] = date('Y', $v);
                    $res_blog[$key]['month'] = date('m', $v);
                    $res_blog[$key]['day'] = date('d', $v);
                }
                if ($k == 'content') {
                    $content = $res_blog[$key]['content'];
                    $content = strip_tags($content);
                    $res_blog[$key]['content'] = mb_substr($content, 0, 500, 'utf-8');
                }
            }
        }
        
        $show = $page->display();
        $this->show = $show;
        $this->res_blog = $res_blog;
        $this->right_part();
        $this->display();
    }

    public function blogRead() { 
        //博文阅读页
        $comment_tab = new CommentModel();
        $id = $_GET['id'];
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        }
        $blog_tab = new BlogModel();
        $res_blog = $blog_tab->field('*,blog.id as blog_id')->join("right join blog_cat ON blog.cat_id = blog_cat.id")->where("blog.id = '{$id}'")->select(); //博客表内容
        $this->right_part(); //右侧栏内容
        foreach ($res_blog as $key => $value) {
            foreach ($value as $k => $v) {
                if ($k == 'cttime') {
                    $res_blog["$key"]['cttime'] = date("Y-m-d H:i:s", $v);
                    $res_blog["$key"]['year'] = date('Y', $v);
                    $res_blog["$key"]['month'] = date('m', $v);
                    $res_blog["$key"]['day'] = date('d', $v);
                }
            }
        }
        /** 查询上一篇内容
         */
        $sql_prevBlog = "select `id`,`title` from `blog` where `id`<'{$id}' order by `id` desc limit 0,1";
        $res_prevBlog = $blog_tab->query($sql_prevBlog);
        if (!empty($res_prevBlog)) {
            $prevID = $res_prevBlog[0]['id'];
            $prevTitle = $res_prevBlog[0]['title'];
            $this->prev = "<a href='__APP__/Home/Blog/blogRead/?id={$prevID}'>$prevTitle</a>";
            //$this->prevTitle = $res_prevBlog[0]['title'];
        } else {
            $this->prev = "没有了";
        }
        /** 查询下一篇内容
         */ 
        $sql_nextBlog = "select `id`,`title` from `blog` where `id`>'{$id}' limit 0,1";
        $res_nextBlog = $blog_tab->query($sql_nextBlog);
        //var_dump($res_nextBlog);
        if (!empty($res_nextBlog)) {
            $nextID = $res_nextBlog[0]['id'];
            $nextTitle = $res_nextBlog[0]['title'];
            $this->next = "<a href='__APP__/Home/Blog/blogRead/?id={$nextID}'>$nextTitle</a>";
        } else {
            $this->next = "没有了";
        }
        
        $email = filter_input(INPUT_POST,'email');
        $nick = filter_input(INPUT_POST,'nick');
        $comment = filter_input(INPUT_POST,'comment');
        if(!empty($email)){
            //评论
            $this->addComment($id,'blog',$nick,$email,$comment);
            //发邮件提醒
            $address = array(
                array(
                    'address'=>'348462402@qq.com',
                    'name' => '小绾'
                ),
                array(
                    'address'=>'caowenpeng1990@126.com',
                    'name'=>'大绾'
                )
            );
            $currentUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
            $pageTitle = $res_blog[0]['title'];
            $subject = '您的博文《'.$pageTitle.'》收到了来自'.$nick.'的评论';
            $content = "<p>博文:<a href='$currentUrl'>$pageTitle</a></p>"
                    . "<p>内容:$comment</p><p>我的邮箱：$email</p>"
                    ."<p>时间：".date('Y-m-d H:i:s')."</p>";
            $this->sendEmail($address, $subject, $content);
        }
        // 遍历评论
        $res_comment = $comment_tab->where("union_id = '{$id}' and category = 'blog'")
                                   ->select();
        //更新阅读次数
        $count = $res_blog[0]['count'];
        $count++;           
        $data['count'] = $count;
        $blog_tab->where("id=$id")->save($data);
        
        // 模板赋值
        $this->res_comment = $res_comment;
        $this->id = $id;
        $this->pageTitle = $res_blog[0]['title'];
        $this->cttime = $res_blog[0]['cttime'];
        $this->day = $res_blog[0]['day'];
        $this->year = $res_blog[0]['year'];
        $this->month = $res_blog[0]['month'];
        $this->content = $res_blog[0]['content'];
        $this->tag = $res_blog[0]['tag'];
        $this->category = $res_blog[0]['category'];
        $this->author = $res_blog[0]['author'];
        $this->count = $count;
        $this->bodyId = "blogRead";
        $this->blog_id = $id;
        $this->user_id = $user_id;
        //layout('Layout/layout');  //模板文件
        $this->display('blogRead');
    }

  

   

}