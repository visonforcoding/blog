<?php
/**
 * 图书模块前端控制器
 */
class BookAction extends PublicAction{
       public function __construct() {
        parent::__construct();
        $this->setUserSession();
    }
    
    public function index(){
        $this->pageTitle = "爱读书|计算机类电子书免费下载";
        $Book_tab = new BookModel();
        $book_sel = $Book_tab->field('book_cat.category,book.*')
                ->join("book_cat ON book_cat.id = book.cat_id")
                ->top8();  //必须继承高级模型类才能使用
        $this->book = $book_sel;
        $this->display('index');
    }
    
    public function book(){
        $book_id =  I('get.id');
        $Book_tab = new BookModel();
        $bookRes_sel = $Book_tab->where("id=$book_id")->find(); 
        $bookName = $bookRes_sel['name'];
        
        //遍历评论
        $comment_tab = new CommentModel();
         $res_comment = $comment_tab->where("union_id = '{$book_id}' and category = 'book'")
                                   ->select();
        
        //添加评论
        $email = I('param.email');
        $nick  = I('param.nick');
        $comment = I('param.comment');
        if(!empty($email)){
             //评论
            $this->addComment($book_id,'book',$nick,$email,$comment);
            //发邮件提醒
            $address = array(
                array(
                    'address'=>'348462402@qq.com',
                    'name' => '小绾'
                ),
                array(
                    'address'=>'caowenpeng1990@126.com',
                    'name'=>'小绾'
                )
            );
            $currentUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
            $subject = '电子书《'.$bookName.'》收到了来自'.$nick.'的评论';
            $content = "<p>链接:<a href='$currentUrl'>$bookName</a></p>"
                    . "<p>内容:$comment</p><p>我的邮箱：$email</p>"
                    ."<p>时间：".date('Y-m-d H:i:s')."</p>";
            $this->sendEmail($address, $subject, $content);
        }
        $this->res_comment = $res_comment;
        $this->pageTitle = $bookName;
        $this->seo_keywords = "$bookName,计算机电子书,电子书下载,免费下载";
        $this->book = $bookRes_sel; 
        $this->display('book');
    }
    
    /**
     * 搜索结果
     */
    public function search(){
        $keywords = I('param.keywords');
        $Book_tab = new BookModel();
        $map['book.name'] = array('like',"%$keywords%");
        $bookRes_serch = $Book_tab->field('book.*,book_cat.category')
                ->join('book_cat ON book.cat_id = book_cat.id')
                ->where($map)
                ->select();
//        $sql = $Book_tab->getLastSql();
//        var_dump($bookRes_serch);
        $this->book = $bookRes_serch;
        $this->display('search');
    }

    /**
     * book 下载数加一
     */
    public function down(){
        $id = $_REQUEST['id'];
        $down = $_REQUEST['down'];
        $Book_tab = new BookModel();
        $data['down'] = $down +1;
        $edit_down = $Book_tab->where("id='$id'")->save($data);
        Log::record("错误：".$edit_down, Log::DEBUG);
        echo $id;
    }
}