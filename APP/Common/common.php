<?php

//公共函数文件
/**
 *  获取当前客户端ip
 * @return String
 */
function getIp() {
    $realip = NULL;
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")) {
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
    return $realip;
}

/**
 * $address = getRealArea($ip);
 * $country = $address['country'];
 * $region = $address['region'];
 * $city = $address['city'];
 * $net = $address['isp'];
 * @param string $ip 客户端ip
 * @return array
 * @link http://ip.taobao.com/service/getIpInfo.ph?ip=   淘宝ip库
 */
function getRealArea($ip) {
    $url = "http://ip.taobao.com/service/getIpInfo.php?ip=" . $ip;
    $ip = json_decode(file_get_contents($url));
    if ((string) $ip->code == '1') {
        return false;
    }
    $data = (array) $ip->data;
    return $data;
}

/**
 * 返回文件后缀名
 * @param string $fileName
 * @return string
 */
function getFileType($fileName) {
    $nameArr = explode('.', $fileName);
    $length = count($nameArr) - 1;
    return $nameArr[$length];
}
