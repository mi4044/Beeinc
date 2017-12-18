<?php 
/**
 * 充值控制器
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/12	蜜蜂科技 
 * *********************************************
 */
class RechargeAction extends CommonAction
{
	public function index()
	{
		$this->checklogin();
		$uid=session('userid');
		//查询用户账户余额
		$data = M('user_balance')->field('balance')->where('userid ='.$uid)->find();
		if(empty($data))
		{
			$data['balance']=0;
			$data['balance']=number_format($data['balance'],2);
		}
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->assign('data',$data );//账户余额
		$this->display();
	}
	
}

?>
