<?php 
/**
 * dochinabank方法
 * 网银在线支付执行函数
 * @param string $v_oid 商户订单号
 * @param string $v_amount 付款金额
 * @param string $$defaultBank 默认银行
 */
 function dochinabank($v_oid,$v_amount,$v_url=""){
 	$v_mid = C("PAY.chinabank_mid");			    // 1001是网银在线的测试商户号，商户要替换为自己的商户号。 
 	$key   = C("PAY.chinabank_key");			    // 参照"网银在线支付B2C系统商户接口文档v4.1.doc"中2.4.1进行设置。
 	if($v_url == "") 	
 	{
 		$v_url = C("chinabankReturnurl");				// 商户自定义返回接收支付结果的页面。对应Receive.php示例。
 	} 	
 	//参照"网银在线支付B2C系统商户接口文档v4.1.doc"中2.3.3.1 	
 	$remark2 ='[url:='.C("chinabankNotifyurl").']';
 	$v_moneytype = "CNY";
 	$text = $v_amount.$v_moneytype.$v_oid.$v_mid.$v_url.$key;        //md5加密拼凑串,注意顺序不能变
 	$v_md5info = strtoupper(md5($text));                             //md5函数加密并转化成大写字母 	
 	$remark1 = trim($_POST['remark1']);					 //备注字段1
 	$pmode_id=$_POST['DefaultBank2'];
 	
?>
<body onLoad="javascript:document.E_FORM.submit()">
<form method="post" name="E_FORM" action="https://Pay3.chinabank.com.cn/PayGate">
	<input type="hidden" name="v_mid"         value="<?php echo $v_mid;?>">
	<input type="hidden" name="v_oid"         value="<?php echo $v_oid;?>">
	<input type="hidden" name="v_amount"      value="<?php echo $v_amount;?>">
	<input type="hidden" name="v_moneytype"   value="<?php echo $v_moneytype;?>">
	<input type="hidden" name="v_url"         value="<?php echo $v_url;?>">
	<input type="hidden" name="v_md5info"     value="<?php echo $v_md5info;?>">
	<input type="hidden" name="pmode_id"       value="<?php echo $pmode_id;?>">
	<input type="hidden" name="remark1"       value="<?php echo $remark1;?>">
	<input type="hidden" name="remark2"       value="<?php echo $remark2;?>">
	
</form>
</body>
<?php
    return;//网银充值转向结束
 	
 }
 
 /**
  * chinabankReturnurl方法
  * 网银在线支付完成回调函数
  */
 function chinabankReturnurl()
 {
 	//****************************************	//MD5密钥要跟订单提交页相同，如Send.asp里的 key = "test" ,修改""号内 test 为您的密钥
 	//如果您还没有设置MD5密钥请登陆我们为您提供商户后台，地址：https://merchant3.chinabank.com.cn/
 	$key=C("PAY.chinabank_key");							//登陆后在上面的导航栏里可能找到“B2C”，在二级导航栏里有“MD5密钥设置”
 	//建议您设置一个16位以上的密钥或更高，密钥最多64位，但设置16位已经足够了
 	//****************************************
 	$v_oid     =trim($_POST['v_oid']);       // 商户发送的v_oid定单编号
 	$v_pmode   =trim($_POST['v_pmode']);    // 支付方式（字符串）
 	$v_pstatus =trim($_POST['v_pstatus']);   //  支付状态 ：20（支付成功）；30（支付失败）
 	$v_pstring =trim($_POST['v_pstring']);   // 支付结果信息 ： 支付完成（当v_pstatus=20时）；失败原因（当v_pstatus=30时,字符串）；
 	$v_amount  =trim($_POST['v_amount']);     // 订单实际支付金额
 	$v_moneytype  =trim($_POST['v_moneytype']); //订单实际支付币种
 	$remark1   =trim($_POST['remark1' ]);      //备注字段1
 	$remark2   =trim($_POST['remark2' ]);     //备注字段2
 	$v_md5str  =trim($_POST['v_md5str' ]);   //拼凑后的MD5校验值
 
 	/**
 	 * 重新计算md5的值
 	*/
 		
 	$md5string=strtoupper(md5($v_oid.$v_pstatus.$v_amount.$v_moneytype.$key));
 	
 	/**
 	 * 判断返回信息，如果支付成功，并且支付结果可信，则做进一步的处理
 	*/ 
 	if ($v_md5str==$md5string)
 	{
 		if($v_pstatus=="20")
 		{
 			return true;
 
 		}else{			
 			return false;
 		}
 
 	}else{
 		return false;
 	}
 }
 
/**
 * chinabankReturnurl方法
 * 网银在线支付完成回调函数
 * 
 * @return unknown|boolean
 */
 function cbkReturnurl()
 {
 	//****************************************	//MD5密钥要跟订单提交页相同，如Send.asp里的 key = "test" ,修改""号内 test 为您的密钥
 	//如果您还没有设置MD5密钥请登陆我们为您提供商户后台，地址：https://merchant3.chinabank.com.cn/
 	$key=C("PAY.chinabank_key");							//登陆后在上面的导航栏里可能找到“B2C”，在二级导航栏里有“MD5密钥设置”
 	//建议您设置一个16位以上的密钥或更高，密钥最多64位，但设置16位已经足够了
 	//****************************************
 	$v_oid     =trim($_POST['v_oid']);       // 商户发送的v_oid定单编号
 	$v_pmode   =trim($_POST['v_pmode']);    // 支付方式（字符串）
 	$v_pstatus =trim($_POST['v_pstatus']);   //  支付状态 ：20（支付成功）；30（支付失败）
 	$v_pstring =trim($_POST['v_pstring']);   // 支付结果信息 ： 支付完成（当v_pstatus=20时）；失败原因（当v_pstatus=30时,字符串）；
 	$v_amount  =trim($_POST['v_amount']);     // 订单实际支付金额
 	$v_moneytype  =trim($_POST['v_moneytype']); //订单实际支付币种
 	$remark1   =trim($_POST['remark1' ]);      //备注字段1
 	$remark2   =trim($_POST['remark2' ]);     //备注字段2
 	$v_md5str  =trim($_POST['v_md5str' ]);   //拼凑后的MD5校验值
 
 	/**
 	 * 重新计算md5的值
 	*/
 		
 	$md5string=strtoupper(md5($v_oid.$v_pstatus.$v_amount.$v_moneytype.$key));
 
 	/**
 	 * 判断返回信息，如果支付成功，并且支付结果可信，则做进一步的处理
 	*/
 	if ($v_md5str==$md5string)
 	{
 		if($v_pstatus=="20")
 		{
 			return $v_oid;
 
 		}else{
 			return false;
 		}
 
 	}else{
 		return false;
 	}
 }
 
 ?>



