<?php
$databaseconfig	=	require './Config/databaseconfig.php';
$uploadconfig	=	require './Config/uploadconfig.php';
$webconfig	=	require './Config/webconfig.php';

$config= array(
	/*
	 * 0:普通模式 (采用传统癿URL参数模式 )
	 * 1:PATHINFO模式(http://<serverName>/appName/module/action/id/1/)
	 * 2:REWRITE模式(PATHINFO模式基础上隐藏index.php)
	 * 3:兼容模式(普通模式和PATHINFO模式, 可以支持任何的运行环境, 如果你的环境不支持PATHINFO 请设置为3)
	 */
	'URL_CASE_INSENSITIVE'=>true,
    'URL_MODEL'=>1,
	'POST_PAGESIZE'=>5,
	'POST_COMMENT_PAGESIZE'=>5,
	'SMS_TPL_VERIFY_CODE' => '您的账号手机效验码是{x}请妥善保管!',//短信验证码模板 不可修改
		
	//默认title keywords discript
	'SEO_TITLE'=>'天材资讯',
	'SEO_KEYWORDS'=>'天材资讯',
	'SEO_DESCRIPT'=>'天材资讯',
		
	//邮件发送配置
	'MAIL_ADDRESS'=>'ppchenliang@sina.com', // 邮箱地址
	'MAIL_LOGINNAME'=>'ppchenliang@sina.com', // 邮箱登录帐号
	'MAIL_SMTP'=>'smtp.sina.com', // 邮箱SMTP服务器
	'MAIL_PASSWORD'=>'LAOPO5201314', // 邮箱密码
	'TMPL_ACTION_ERROR'=>'Public/jump',// 定义错误跳转页面URL地址
	'TMPL_ACTION_SUCCESS'=>'Public/jump',// 定义错误跳转页面URL地址
	
	//邮件发送配置
	'MAIL_ADDRESS'=>'david136796@126.com', // 邮箱地址
	'MAIL_LOGINNAME'=>'david136796@126.com', // 邮箱登录帐号
	'MAIL_SMTP'=>'smtp.126.com', // 邮箱SMTP服务器
	'MAIL_PASSWORD'=>'zhang14789632', // 邮箱密码

);




return array_merge($config,$databaseconfig,$uploadconfig,$webconfig);

?>