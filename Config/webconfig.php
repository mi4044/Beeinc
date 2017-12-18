<?php
return array(
    'WEB_URL' => 'http://beeinc.cn:8080/ht/',//资源（图片，视频）路径
    'PROBATION_EXPIRE_TIME' => 7,//app软件试用期 /天
    'mail' =>
        array(
            'site_name' => '蜜蜂科技',
            'email_addr' => 'mifeng@beeinc.cn',
            'email_type' => '1',
            'email_host' => 'smtp.mxhichina.com',
            'email_port' => '25',
            'email_id' => 'mifeng@beeinc.cn',
            'email_pass' => '1QAZxsw23EDC',//            '__hash__' => '1ad879c7738c53430fed62451b956fca_854e0d900ef464d3bf3d6f32039ac261',
            '__hash__' => '1ad879c7738c53430fed62451b956fca_854e0d900ef464d3bf3d6f32039ac261asdas',
        ),
    'SOURCE_PATH' => 'http://localhost' . dirname($_SERVER['SCRIPT_NAME']) . '/',//资源路径

    //短信
//    'sms_account_username' => '',
//    'sms_account_password' => 'beeway83530603',

    //分享功能配置
    'SHARE_COMPANY_NAME' => '四川蜜蜂科技：家居建材展示软件服务商',//公司信息
    'SHARE_COMPANY_WEBSITE' => 'http://www.beeway.cn/',//公司网站
    'SHARE_COMPANY_TEL' => '028-83530603',//服务热线

    'SHARE_TITLE' => '蜜蜂科技分享',//分享标题
    "SHARE_EMAIL_TITLE" => "蜜蜂科技分享",//邮箱分享title标题
    'SMS_TPL_SHARE' => '尊敬的客户蜜蜂科技为你分享,预览地址{x} 有任何建议请反馈!',//短信分享模板 不可修改


    //短信验证码发送模板
    'SMS_TPL_VERIFY_CODE' => '您的账号手机效验码是{x}请妥善保管!',//短信验证码模板 不可修改
    //邮箱验证码发送模板
    'EMAIL_TPL_VERIFY_CODE' => '【蜜蜂科技】尊敬的客户你获取的验证码是：{x}，有效时间10分钟，请妥善保管！',//邮箱验证码模板
    'EMAIL_TPL_VERIFY_CODE_TITLE' => '[蜜蜂科技]你的验证码到了',//邮箱验证码title

    //版权
    'COPYRIGHT' => 'Copyright &copy; 2016 <a href="http://www.beeinc.cn" target="_blank">蜜蜂科技</a>',//后台管理版权
    //banner显示图片的张数
    'AD_BANNER_NUMBER' => 5,
    //终端引导显示图片的张数
    'AD_GUIDED_NUMBER' => 1,

    //@todo 公共缓存文件目录后台和app公用 必须
    'COMMON_CACHE_DIR' => './Runtime/Common/',

    //@todo 公用验证码长度 必须
    'VERIFY_CODE_LENGTH'=>4,

    //@todo 验证码过期时间(秒钟) 必须
    'VERIFY_CODE_EXPIRE_TIME' => 600,
    'UPLOAD_LOG_PATH'=>RUNTIME_COMMON_PATH.'Upload_log/',//文件上传记录，不能删除或者修改否者会导致垃圾文件无法删除

    //产品来源设定，不能修改，否者终端和服务器不一致导致无法筛选出问题
    'PRODUCT_SOURCE_COMMON'=>0,//公用
    'PRODUCT_SOURCE_SHARE'=>2,//分享的
    'PRODUCT_SOURCE_PERSON'=>1,//自己的
);