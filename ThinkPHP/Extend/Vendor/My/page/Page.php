<?php

/*
 * Created on 2012-10-1
 *
 *  @分页类的编写
 */

class MyPage {

    private $total; //数据表中数据的总记录数
    private $listrows; //每页显示行数
    private $uri;
    private $limit;
    private $pagenum; //总页数
    private $listNum = 5; //页数列表长度
    private $offset;

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }

    function __construct($total, $listrows = 2) {

        $this->total = $total;
        $this->listrows = $listrows;
        $this->uri = $this->getUri();
        $this->page = !empty($_GET['page']) ? $_GET['page'] : '1'; // 当前页码
        $this->pagenum = ceil($this->total / $this->listrows); //总页数
        $this->limit = $this->setLimit();
        $this->offset = ($this->page - 1) * $listrows;
    }

    function getUri() {
        $url = $_SERVER['REQUEST_URI'] . (strpos($_SERVER['REQUEST_URI'], '?') ? '' : '?');

        $parse = parse_url($url);
        if (isset($parse['query'])) {
            parse_str($parse['query'], $params);
            unset($params['page']);
            $url = $parse['path'] . '?' . http_build_query($params);
            $parse = parse_url($url);
            if (isset($parse['query'])) {
                $url = $parse['path'] . '?' . $parse['query'] . '&';
            }
        }
        return $url;
    }

    function setLimit() {
        return "limit " . ($this->page - 1) * $this->listrows . ",{$this->listrows}";
    }

    function pageList() {
        $link = "";
        $iNum = floor($this->listNum / 2);
        for ($i = $iNum; $i >= 1; $i--) {
            $page = $this->page - $i;
            if ($page < 1)
                continue;
            $link.="<li><a href='{$this->uri}page={$page}'>{$page}</a><li>";
        }
        $link.="<li class='active'><a>{$this->page}</a></li>";
        for ($i = 1; $i <= $iNum; $i++) {
            $page = $this->page + $i;
            if ($page <= $this->pagenum)
                $link.="<li><a href='{$this->uri}page={$page}'>{$page}</a></li>";
            else
                break;
        }
        return $link;
    }

    function display() {
        $html = "";
        $html.= "<li><a href='#'>共{$this->total}条记录</a></li>";
        $html.="<li><a href='#'>第<font color=red>{$this->page}</font>页/共{$this->pagenum}页</a></li>";
//        if ($this->page == 1)
//            $html.='';
//        else
//            $html.="<li><a href='{$this->uri}page=1'>首页</a></li>";
        if ($this->page == 1)
            $html.='';
        else
            $html.="<li><a href='{$this->uri}page=" . ($this->page - 1) . "'>上一页</a></li>";
        $html.=$this->pageList();
        if ($this->page == $this->pagenum)
            $html.="";
        else
            $html.="<li><a href='{$this->uri}page=" . ($this->page + 1) . "'>下一页</a></li>";
//        if ($this->page == $this->pagenum)
//            $html.="";
//        else
//            $html.="<li><a href='{$this->uri}page={$this->pagenum}'>尾页</a></li>";


        return $html;
    }

}


