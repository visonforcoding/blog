<?php

/**
 * 图书模块
 */
class BookAction extends PublicAction {

    public function __construct() {
        parent::__construct();
        $this->checkAdminSession();   //登录session 检测
    }

    /**
     * 添加图书
     */
    public function addBook() {
        $BookCat_tab = new CommonModel('book_cat');
        $res_bookCat = $BookCat_tab->select();
        $bookPath = C('TMPL_PARSE_STRING.__RESOURCES__') . '/book/';
//        $RESOURCE = C('TMPL_PARSE_STRING.__RESOURCES__');
        $this->pic = $this->getPic($bookPath);
        $this->bookCat = $res_bookCat;
        $this->display('addBook');
    }

    /**
     * 处理添加图书
     */
    public function doAddBook() {
        $name = $this->_param('name');   //thinkphp 获取请求方法
        $author = $this->_param('author');
        $cat_id = $this->_param('cat_id');
        $admire = $this->_param('admire');
        $pic = $this->_param('pic');
        $summary = $_REQUEST['summary']; // thinkphp 转码了输入的HTMl标签
        $download = $this->_param('download');
        $code = $this->_param('code');
        if (function_exists(get_magic_quotes_gpc) && get_magic_quotes_gpc()) {
            //有的服务器 开启了自动添加反斜杠 进行转义
            $summary = stripslashes($summary);
            $pic = stripslashes($pic);
        }
        $data['name'] = $name;
        $data['author'] = $author;
        $data['cat_id'] = $cat_id;
        $data['admire'] = $admire;
        $data['pic'] = $pic;
        $data['summary'] = $summary;
        $data['download'] = $download;
        $data['code'] = $code;

        $Book_tab = new BookModel();

        //根据参数进行修改或添加操作
        if (isset($_GET['do'])) {
            if (isset($_GET['book_id'])) {
                $id = $_GET['book_id'];
                $res_ins = $Book_tab->where("id = {$id}")->save($data);
            }
        } else {
            $res_sel = $Book_tab->sel("name='$name'");
            if ($res_sel > 0) {
                echo "该图书已存在！";
            } else {
                $res_ins = $Book_tab->add($data);
            }
        }
        if ($res_ins) {
            echo '操作成功！';
        } else {
            echo $Book_tab->getError();
        }
    }

}
