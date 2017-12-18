<?php
/**
 * 此函数是用来发送短信的，并将发送记录写入数据库表sms中，且返回发送状态
 * @param int $tel 短信接收端的电话号码
 * @param string $content 发送短信的内容
 * @return 1 发送短信成功
 * @return 0 发送短信失败
 */
function smsSend( $tel , $content ){
	$username = C('sms_account_username');
	$password = C('sms_account_password');
	$contents = urlencode(iconv('UTF-8', 'GB2312', $content.C('sms_signature')));
	$url='http://www.sms1086.com/plan/api/Send.aspx?username='.$username.'&password='.$password.'&mobiles='.$tel.'&content='.$contents;

	//获取短信发送返回信息
	if ( function_exists ( 'file_get_contents' ) ) {
		$sms_return = file_get_contents($url);
	} else {
		$curl = curl_init();
		$timeout = 5;
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
		$sms_return = curl_exec($curl);
		curl_close($curl);
	}

	$res = array();
	//发送后对数据进行处理并并写入数据库
	if ($sms_return == '') {
		return 0;
	} else {
		$result = iconv("GB2312", "UTF-8", urldecode($sms_return));
		$result = explode('&', $result);
		foreach ($result as $re) {
			$temp = explode('=', $re);
			$res[$temp[0]] = $temp[1];
		}

		//构建发送到数据库的数据
		$add_sms = array(
				'tel' => $tel ,
				'content' => $content ,
				'time' => date("Y-m-d H:i:s",time()) ,
				'account' => $username ,
				'status' => '' ,
				'desc' => $res['description'] ,
		);

		//写入数据库之前的错误判断
		$model = D ('sms');
		if (false === $model->create ()) {
			$this->error ( $model->getError () );
		}

		//写入数据库并返回值
		if ($res['result'] == 0) {
			$add_sms['status'] = 'y';
			$model->add($add_sms);
			return 1;
		} else {
			$add_sms['status'] = 'n';
			$model->add($add_sms);
			return 0;
		}
	}
}