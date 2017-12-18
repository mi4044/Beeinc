<?php 
/**
 * 产品控制器
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/12	蜜蜂科技 
 * *********************************************
 */
class ProductAction extends CommonAction
{
	public function index()
	{
		$data=M('web_product')->where('status = 1')->select();
		
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('data',$data);
		$this->display();
	}
	
	
}

?>
