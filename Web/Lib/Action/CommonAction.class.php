<?php
/**
 * 总控制器
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/5	蜜蜂科技 
 * *********************************************
 */
class CommonAction extends Action {
	function _empty()
	{
        header("Location: /404.html");
    }
	//头部用户数量
	function usernumber()
	{
		$basic=181669;
		$user_num = M('user')->count();
		$num = $basic+$user_num;
		return $num;
	}
	//判断是否已经登录
	public function checklogin(){
		
		if( is_null(session('userid')))
		{
			S('login_in_url',$_SERVER['REQUEST_URI']);
			$this->redirect('public/login');
		}
	}
}
?>