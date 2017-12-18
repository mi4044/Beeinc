<?php 
/**
 * 空控制器
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/5	蜜蜂科技 
 * *********************************************
 */
class EmptyAction extends Action
{
	function _empty()
	{
        header("HTTP/1.0 404 Not Found");
        $this->display('Public:404');
    }
    //404页面
    function index() 
	{
        header("HTTP/1.0 404 Not Found");
        $this->display('Public:404');

    }
}

?>