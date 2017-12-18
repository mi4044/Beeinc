<?php 
/**
 * 服务网点控制器
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/12	蜜蜂科技 
 * *********************************************
 */
class ServicenetAction extends CommonAction
{
	public function index()
	{
		$data=M('servicenet')->where('status = 1')->select();
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('data', $data );
		$this->display();
	}
}

?>
