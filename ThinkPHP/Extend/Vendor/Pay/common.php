<?php 

	/**
	 *  更新用户资金
	 * @param unknown $total_fee 资金
	 * @param unknown $trade_no 订单号
	 * @param unknown $orderkind 支付类型
	 * @param string $remark 备注
	 * @return boolean
	 */
 	function UpdataForUser($total_fee,$trade_no,$orderkind,$remark="")
	{
		if (empty($_SESSION['updataforuserverify']) && $_SESSION['updataforuserverify']==$trade_no) {
			$_SESSION['updataforuserverify']=$trade_no;
		}
		else 
		{
			return true;
		}
		// 获取用户名
		if(empty($_SESSION[C('USER_AUTH_KEY')]))
		{
			$this->error("请先登录！");
		}
		$_userid =$_SESSION[C('USER_AUTH_KEY')];
		$_userlevel =  $_SESSION['userlevel'];
		
		$user=M ( "Customer" ); //用户模型
		$moneyflow=M('moneyflow'); //资金流模型
		$data_user=$user->where ( array ("id=" . $_userid ))->find ();
		$_money_before=$data_user['amountlive'];
		
		$news_data_user["id"]=$data_user['id'];
		$news_data_user['amounttotal'] +=$total_fee; //增加账户余额
		$news_data_user['amountlive'] +=$total_fee; //增加可用余额
		
		$ret_user=$user->save($news_data_user); //保存用户信息	
		
		//增加资金变动记录		
		/**
		 * 交易流水记录
		 */
		$data_mf=array(
				'userid' =>	$_userid,//用户ID
				'useraccount'  =>$data_user['account'], //用户账户
				'operator'=> $data_user['account'],//操作者
				'faceamount' =>$total_fee,
				'money_before' =>$_money_before, //	交易前资金		
				'amount' =>$total_fee,//交易金额
				'money_after'=>$_money_before + $total_fee,//交易后资金
				'createtime'=>$_GET['notify_time'], //创建时间
				'orderkind' =>$orderkind, //交易类型
				'ordertable'=>'user', //交易表
				'orderno' =>$trade_no, //订单号
				'remark' =>$remark //备注
		);
		
		//添加交易流水
		$mf_id=$moneyflow->add($data_mf);
		
		return $ret_user;
	}	
	
	
?>