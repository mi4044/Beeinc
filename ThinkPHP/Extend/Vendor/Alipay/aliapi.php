<?php 

/**
 * doalipay方法
 * 该方法其实就是将接口文件包下alipayapi.php的内容复制过来然后进行相关处理
 * @param string $tradeNo 商户订单号
 * @param string $ordsubject 订单名称
 * @param string $totalFee 付款金额
 * @param string $ordbody 订单描述
 * @param string $showUrl 商品展示地址 
 * @param string $showUrl 页面跳转同步通知页面路径
 * @param string $showUrl 服务器异步通知页面路径
 */
 function doalipay($tradeNo,$ordsubject,$totalFee,$ordbody,$showUrl,$return_url="",$notify_url=""){

	//这里我们通过TP的C函数把配置项参数读出，赋给$alipay_config；
	$alipay_config=C('alipay_config');

	/**************************请求参数**************************/
	$payment_type = "1"; //支付类型 //必填，不能修改
	$seller_email = $alipay_config['seller_email'];//卖家支付宝帐户必填
	$out_trade_no = $tradeNo;//商户订单号 通过支付页面的表单进行传递，注意要唯一！
	$subject = $ordsubject;  //订单名称 //必填 通过支付页面的表单进行传递
	$total_fee = $totalFee;   //付款金额  //必填 通过支付页面的表单进行传递
	$body =$ordbody;//订单描述 通过支付页面的表单进行传递
	$show_url = $showUrl;//$_POST['ordshow_url'];  //商品展示地址 通过支付页面的表单进行传递
	$anti_phishing_key = "";//防钓鱼时间戳 //若要使用请调用类文件submit中的query_timestamp函数
	$exter_invoke_ip = get_client_ip(); //客户端的IP地址
	//默认支付方式
	$paymethod = "bankPay";
	//必填
	//默认网银
	$defaultbank = $_POST['Ddefaultbank'];
	if ($return_url=="") {
		$return_url =C('aliReturnurl'); //页面跳转同步通知页面路径
	}
	if ($notify_url=="") {
		$notify_url =C('aliNotifyurl'); //服务器异步通知页面路径
	}
	/************************************************************/

	//构造要请求的参数数组，无需改动
	$parameter = array(
			"service" => "create_direct_pay_by_user",
			"partner" => trim($alipay_config['partner']),
			"payment_type"    => $payment_type,			
			"notify_url"    => $notify_url,
			"return_url"    => $return_url,
			"seller_email"    => $seller_email,
			"out_trade_no"    => $out_trade_no,
			"subject"    => $subject,
			"total_fee"    => $total_fee,
			"body"            => $body,
			"paymethod"	=> $paymethod,
			"defaultbank"	=> $defaultbank,
			"show_url"    => $show_url,
			"anti_phishing_key"    => $anti_phishing_key,
			"exter_invoke_ip"    => $exter_invoke_ip,
			"_input_charset"    => "utf-8"
	);
	//建立请求
	$alipaySubmit = new AlipaySubmit($alipay_config);
	$html_text = $alipaySubmit->buildRequestForm($parameter,"post", "确认");
	echo $html_text;
}

?>