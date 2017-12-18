<?php 
/**
 * 首页控制器
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/5	蜜蜂科技 
 * *********************************************
 */
class IndexAction extends CommonAction
{
	public function index()
	{
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->display();
	}
	
}

?>
