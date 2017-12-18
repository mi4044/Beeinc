<?php
/**
 * 用于获取账号剩余短信条数
 * @return string $bal['balance'] 剩余短信条数
 */
function smsBalance(){
	$username = C('sms_account_username');
	$password = C('sms_account_password');
	$url='http://www.sms1086.com/plan/api/Query.aspx?username='.$username.'&password='.$password;

	//对账号进行查询
	if ( function_exists ( 'file_get_contents' ) ) {
		$sms_balance = file_get_contents($url);
	} else {
		$curl = curl_init();
		$timeout = 5;
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
		$sms_balance = curl_exec($curl);
		curl_close($curl);
	}

	//对系统返回值进行处理
	$balance = iconv("GB2312", "UTF-8", urldecode($sms_balance));
	$balance = explode('&', $balance);
	foreach ($balance as $ba) {
		$temp = explode('=', $ba);
		$bal[$temp[0]] = $temp[1];
	}

	return $bal['balance'];
}