<?php

// 公共Acton 只能用于继承
class PublicAction extends Action {

    /**
     * 引入验证码方法
     */
    public function verify() {
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }

    /** 	
     * 后台session 验证
     */
    function checkAdminSession() {
        $session_admin = session('admin');
        if (empty($session_admin)) {
            $url = U('Admin/Index/index'); //我也不知道为什么这里一定要这样
            $this->error('非法操作，请登录', $url);
        } else {
            $this->user = $session_admin;
        }
    }

    /**
     * 前台session 设置
     */
    function setUserSession() {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }
        /*  if(isset($_COOKIE['user'])){
          $user = $_COOKIE['user'];
          } */
        if (!empty($user)) {
            $this->user = $user;
        } else {
            $this->user = "登录";
        }
    }

    /**
     *  发送邮件函数   支持群发
     * @param array $address  
     * array(array(
     *      'address'=>$address,
     *     'name' => $name
     *        )
     *        )
     * @param type $subject  邮件主题
     * @param type $content   邮件内容
     * @param type $attachment  附件
     */
    function sendEmail(array $address, $subject, $content, $attachment) {
        Vendor('My.phpmailer.PHPMailerAutoload');
        $mail = new PHPMailer(); //new一个PHPMailer对象出来
        $mail->isSMTP();     // 使用SMTP协议
        $mail->Charset = "UTF-8";  //编码
        $mail->Host = 'smtp.126.com';  // Specify main and backup server
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'caowenpeng1990';                            // SMTP username
        $mail->Password = '348462402';                           // SMTP password
        // $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
        $mail->From = 'caowenpeng1990@126.com';
        $mail->FromName = '小绾';
        foreach ($address as $value) {
            $add = $value['address'];
            $name = $address['name'];
            $mail->addAddress($add, $name);
        }
        //$mail->addReplyTo('info@example.com', 'Information');
        if (!empty($attachment)) {
            $mail->addAttachment($attachment);         // Add attachments
        }
        $mail->isHTML(true); // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body = "$content";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            Log::write('邮件发送错误：' . $mail->ErrorInfo, Log::ERR);
        }
    }

    /**
     * 
     */
    function right_part() {
        //右侧栏目内容
        $BlogCat_tab = new CommonModel('blog_cat');
        $blog_tab = new BlogModel();
        $sql = "select count(*),`blog_cat`.* from `blog_cat`,`blog` where `blog_cat`.`id` "
                . "= `blog`.`cat_id` group by `category`";
        $res = $BlogCat_tab->query($sql);
        $sql_tag = "select * from `blog` group by `tag`";
        $res_tag = $blog_tab->query($sql_tag);
        //$res_tab = $blog_tab->select();

        $tag_color = array(
            '',
            'label-success',
            'label-warning',
            'label-important',
            'label-info',
            'label-inverse');
        //$ran = array_rand($tag_color);
        //$ran = rand(0,5);
        //$color = $tag_color["$ran"];
        $this->tag_color = $tag_color;
        //var_dump($res_tag);
        $this->res_tag = $res_tag;
        $this->res_blogCat = $res;
    }

    /**
     * 根据路径获取目录图片
     * @param string $path
     * @return string
     */
    function getPic($path) {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $truePath = $root . $path;
        $fileHandle = scandir($truePath);
        $imgType = array('jpg', 'png', 'gif', 'JPG');
        foreach ($fileHandle as $value) {
            if ($value != '.' && $value != '..') {
                if (!is_dir($value)) {
                    $fileType = getFileType($value);
                    if (in_array($fileType, $imgType)) {
                        $pic = $path . $value;
                        $output[] = $pic;
                    }
                }
            }
        }
        return $output;
    }

    /**
     * 添加评论并发送邮件
     * @param type $union_id 评论的类别
     * @param type $category
     * @param type $nick
     * @param type $email
     * @param type $comment
     */
    public function addComment($union_id, $category, $nick, $email, $comment) {
        $comment_tab = new CommentModel();
        $time = date('Y-m-d H:i:s');
        $ip = get_client_ip();
        $address = getRealArea($ip);
        $country = $address['country'];
        $region = $address['region'];
        $city = $address['city'];
        $net = $address['isp'];
        $data = array(
            'union_id' => $union_id,
            'category' => $category,
            'nick' => $nick,
            'email' => $email,
            'content' => $comment,
            'cttime' => $time,
            'ip' => $ip,
            'country' => $country,
            'region' => $region,
            'city' => $city,
            'net' => $net
        );
        $comment_tab->add($data);
        // $sql = $comment_tab->getLastSql();
        // Log::record("添加评论SQL", $sql, Log::SQL);  //debug
    }

    /**
     * 根据路径列出文件目录结构
     * @param string $path
     * @return array
     */
    public function getResource($path) {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $truePath = $root . $path;
        $fileHandle = scandir($truePath);
        $output ="";
        foreach ($fileHandle as $value) {
            if ($value != '.' && $value != '..') {
                $file = $path .'/' . $value;
                if (is_dir($root.$file)) {
                    $rePath = preg_replace('/\//',',', $file);
                    $output .= "<ul class='dir-tree ml20'>"
            . "<li class='folder'><span class='icon icon-subtract'>"
                            . "</span>  <span class='icon-folder'></span> "
                            . "<a href='#' class='path' path='$rePath'><span>$value</span></a>";
                    $output .= $this->getResource($file);
                } 
            }
        }
        $output .= "</li></ul>";
        
        return $output;
    }

}
