<?php

/**
 * doalipay方法
 * 该方法其实就是将接口文件包下alipayapi.php的内容复制过来然后进行相关处理
 * @param string $tradeNo 商户订单号
 * @param string $ordsubject 订单名称
 * @param string $totalFee 付款金额
 * @param string $ordbody 订单描述
 */
function dotenpay($tradeNo,$ordsubject,$totalFee,$ordbody,$return_url="")
{	
	require_once ("classes/PayRequestHandler.class.php");
	$bargainor_id = C("PAY.tenpay_id");	/* 商户号 */	
	$key = C("PAY.tenpay_key");	/* 密钥 */
	if($return_url=="")
	{
		$return_url = C("tenReturnurl");	/* 返回处理地址 */
	}	
	//date_default_timezone_set(PRC);
	$strDate = date("Ymd");
	$strTime = date("His");	
	//4位随机数
	$randNum = rand(1000, 9999);	
	//10位序列号,可以自行调整。
	$strReq = $strTime . $randNum;	
	/* 商家订单号,长度若超过32位，取前32位。财付通只记录商家订单号，不保证唯一。 */
	$sp_billno = $tradeNo;	
	/* 财付通交易单号，规则为：10位商户号+8位时间（YYYYmmdd)+10位流水号 */
	$transaction_id = $bargainor_id . $strDate . $strReq;	
	/* 商品价格（包含运费），以分为单位 */
	$total_fee = $totalFee*100;	
	/* 商品名称 */
	$desc = $ordsubject;
	//
	if(empty($_POST["DefaultBank1"]))
	{
		$bank_type =0;		
	}
	else 
	{
		$bank_type =$_POST["DefaultBank1"];
	}
		
	/* 创建支付请求对象 */
	$reqHandler = new PayRequestHandler();
	$reqHandler->init();
	$reqHandler->setKey($key);

	//----------------------------------------
	//设置支付参数
	//----------------------------------------
	$reqHandler->setParameter("bargainor_id", $bargainor_id);			//商户号
	$reqHandler->setParameter("sp_billno", $sp_billno);					//商户订单号
	$reqHandler->setParameter("transaction_id", $transaction_id);		//财付通交易单号
	$reqHandler->setParameter("total_fee", $total_fee);					//商品总金额,以分为单位
	$reqHandler->setParameter("return_url", $return_url);				//返回处理地址
	$reqHandler->setParameter("desc", $desc);	//商品名称  remarkexplain
	$reqHandler->setParameter("attach", $ordbody); //备注
	$reqHandler->setParameter("bank_type", $bank_type); //
	//用户ip,测试环境时不要加这个ip参数，正式环境再加此参数
	$reqHandler->setParameter("spbill_create_ip", $_SERVER['REMOTE_ADDR']);
	
	//请求的URL
	$reqUrl = $reqHandler->getRequestURL();
	
	//debug信息
	$debugInfo = $reqHandler->getDebugInfo();
	
	//重定向到财付通支付
	$reqHandler->doSend();
	
}
/**
 * * chinabankReturnurl方法
 * 网银在线支付完成回调函数
 * @return multitype:unknown |boolean
 */
function tenReturnurl()
{
	require_once ("classes/PayResponseHandler.class.php");

	/* 密钥 */
	$key = C("PAY.tenpay_key");	
	/* 创建支付应答对象 */
	$resHandler = new PayResponseHandler();
	$resHandler->setKey($key);	
	//判断签名
	if($resHandler->isTenpaySign()) {	
		//交易单号
		$transaction_id = $resHandler->getParameter("transaction_id");	
		//金额,以分为单位
		$total_fee = $resHandler->getParameter("total_fee");	
		//支付结果
		$pay_result = $resHandler->getParameter("pay_result");	
		if( "0" == $pay_result ) {	
			$data=array("total_fee"=>$total_fee,"$trade_no"=>$transaction_id);
 			return $data;	
		} else {
			//当做不成功处理
			return false;
		}	
	} else {
		//认证签名失败
		return false;
	}
}

/**
 * chinabankReturnurl方法
 * 网银在线支付完成回调函数
 * @param string $orderkind 商户订单号
 * @param string $remark 付款金额
 */
function tenReturl()
{
	require_once ("classes/PayResponseHandler.class.php");

	/* 密钥 */
	$key = C("PAY.tenpay_key");
	/* 创建支付应答对象 */
	$resHandler = new PayResponseHandler();
	$resHandler->setKey($key);
	//判断签名
	if($resHandler->isTenpaySign()) {
		//交易单号
		$transaction_id = $resHandler->getParameter("transaction_id");
		//金额,以分为单位
		$total_fee = $resHandler->getParameter("total_fee");
		//支付结果
		$pay_result = $resHandler->getParameter("pay_result");
		if( "0" == $pay_result ) {
			return $transaction_id;
		} else {
			//当做不成功处理
			return false;
		}
	} else {
		//认证签名失败
		return false;
	}
}


?>
