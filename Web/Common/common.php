<?php
require './Common/user.php';
require './Common/common.php';

/*根据条件获取信息
 *
 *
 */
function getinfo($map,$db){
    if($map){
        $info=M(''.$db.'')->where($map)->find();
        return $info;
    }else{
        return false;
    }

}

/**
 * 检测验证码
 */
function check_verify($code, $id = 1){
	
	return (md5($code)==$_SESSION["verify"]);
}


//查询登录后的用户的资料
function getuserinfo(){
	$userid=session("userid");
	if($userid){
		$userinfo=M('user')->where(array('id'=>$userid))->find();
		return $userinfo;;
	}else{
		return false;
	}
}
/**
 * 字符串截取，支持中文和其他编码
 * @static
 * @access public
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 * @return string
 */
function msubstr($str, $start=0, $length) {
    $charset="utf-8";
    $suffix=true;
    if(function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif(function_exists('iconv_substr')) {
        $slice = iconv_substr($str,$start,$length,$charset);
        if(false === $slice) {
            $slice = '';
        }
    }else{
        $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }
    return $suffix ? $slice.'' : $slice;
}


