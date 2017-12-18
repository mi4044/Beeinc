<?php
return array(
    'UPLOADS_TEMP_PATH' => PUBLIC_PATH . 'Temp/',//文件上传临时存储目录
    'USER_UPLOADS_PATH' => '/Public/Uploads/User/',//单页附件上传路径
    'USER_UPLOADS_SIZE' => '1000000000000',// 单页附件上传大小限制
    'USER_UPLOADS_TYPE' => array("*.jpg", "*.jepg", "*.png", "*.bmp", "*.gif"),//单页附件文件类型
    //场景资源目录
    'UPLOADS_SCENE_PATH' => PUBLIC_PATH . 'Source/Scene/',
    //户型资源目录
    'UPLOADS_HOUSE_PATH' => PUBLIC_PATH . 'Source/House/',
    //产品资源目录
    'UPLOADS_PRODUCT_PATH' => PUBLIC_PATH . 'Source/Product/',
	//产品材质库目录
	'UPLOADS_PRODUCT_MATERIALURL_PATH' => PUBLIC_PATH . 'Source/Product/Materialurl/',
	//产品大图目录
	'UPLOADS_PRODUCT_PIC_PATH' => PUBLIC_PATH . 'Source/Product/Pic/',
	//产品缩略图目录
	'UPLOADS_PRODUCT_THUMB_PATH' => PUBLIC_PATH . 'Source/Product/Thumb/',
	'UPLOADS_PRODUCT_EXT' => array("jpg", "jepg", "png", "bmp"),//产品图片类型
    'UPLOADS_PRODUCT_SIZE' => '1000000000000',//产品图片大小限制
    //铺贴模板目录
    'UPLOADS_PAVES_PATH' => PUBLIC_PATH . 'Source/Paves/',
    //铺贴方案目录
    'UPLOADS_SCHEMEPAVES_PATH' => PUBLIC_PATH . 'Source/SchemePaves/',
    //点位压缩包
    'UPLOADS_POINT_EXT' => array("zip"),
    'UPLOADS_POINT_SIZE' => '1000000000000',
    //供应商logo目录
    'UPLOADS_SUPPLIER_PATH' => PUBLIC_PATH . 'Source/Supplier/',

    //软件目录
    'UPLOADS_SOFT_EXT' => array('zip'),//软件后缀限制
    'UPLOADS_SOFT_SIZE' => '1000000000000',//软件大小限制
    'UPLOADS_SOFT_PATH' => PUBLIC_PATH . 'Source/Software/Soft/',//软件包保存路径
    'UPLOADS_SOFT_LOGO_PATH' => PUBLIC_PATH . 'Source/Software/Logo/',//软件logo路径


    //资源压缩包
    'UPLOADS_RESOURCE_EXT' => array("zip", "rar"),//资源压缩包类型
    'UPLOADS_RESOURCE_SIZE' => '1000000000000',//资源压缩包类型文件大小限制
    'UPLOADS_RESOURCE_PATH' => PUBLIC_PATH . '/Public/Uploads/Temp/',//3D模型类型文件大小限制

    //3d
    'UPLOADS_MODEL_EXT' => array("unity3d"),//3D模型类型
    'UPLOADS_MODEL_SIZE' => '1000000000000',//3D模型类型文件大小限制
    'UPLOADS_MODEL_PATH' => PUBLIC_PATH . '/Public/Uploads/Temp/',//3D模型类型文件大小限制


    'UPLOADS_IMG_EXT' => array("jpg", "jepg", "png", "bmp", "gif"),//图片类型
    'UPLOADS_IMG_SIZE' => '1000000000000',//图片类型大小限制
    //    'UPLOADS_IMG_PATH' => PUBLIC_PATH . 'Uploads/Source/Scene/',//图片保存路径

    //用户头像
    'UPLOADS_HEADER_EXT' => array("jpg", "jepg", "png", "bmp", "gif", 'dat'),//用户头像
    'UPLOADS_HEADER_SIZE' => '1000000000000',//用户头像
    'UPLOADS_HEADER_PATH' => PUBLIC_PATH . 'Source/User/Head/',//头像路径

    'UPLOADS_SHARE_EXT' => array("jpg", "jepg", "png", "bmp", "gif", 'dat'),//分享图片后缀
    'UPLOADS_SHARE_SIZE' => '1000000000000',//分享图片尺寸
    'UPLOADS_SHARE_PATH' => PUBLIC_PATH . 'Source/Share/',//分享图片路径

    'UPLOADS_SHARE_MODEL_EXT' => array("jpg", "jepg", "png", "bmp", "gif", 'dat'),//分享模板图片后缀
    'UPLOADS_SHARE_MODEL_SIZE' => '1000000000000',//分享模板图片尺寸
    'UPLOADS_SHARE_MODEL_PATH' => PUBLIC_PATH . 'Source/Sharemode/',//分享模板图片路径

    //广告banner
    'UPLOADS_BANNER_EXT' => array("jpg", "jepg", "png", "bmp", "gif", 'dat'),//分享图片后缀
    'UPLOADS_BANNER_SIZE' => '1000000000000',//分享图片尺寸
    'UPLOADS_BANNER_PATH' => PUBLIC_PATH . 'Source/Ad/Banner/',//分享图片路径

    //终端启动引导广告
    'UPLOADS_GUIDED_EXT' => array("jpg", "jepg", "png", "bmp", "gif", 'dat'),//后缀
    'UPLOADS_GUIDED_SIZE' => '1000000000000',//尺寸
    'UPLOADS_GUIDED_PATH' => PUBLIC_PATH . 'Source/Ad/Guided/',//图片路径
	

    // 公司标志
    'COMPANY_LOGO_UPLOADS_PATH' => '/Public/Uploads/Post/',//商品附件上传路径
    'COMPANY_LOGO_UPLOADS_SIZE' => '1000000000000',// 商品附件上传大小限制
    'COMPANY_LOGO_UPLOADS_TYPE' => array("jpg", "jepg", "png", "bmp", "gif"),//商品附件文件类型

    'ARTICLE_IMAGE_LIMIT' => 40,
	//官网产品
	'UPLOADS_WEBPRODUCT_PATH' => PUBLIC_PATH . 'Source/Webproduct/',//官网产品图片路径
	//招商手册
	'UPLOADS_ZHAOSHANGMANUAL_PATH' => PUBLIC_PATH . 'Source/Zhaoshangmanual/',//招商手册图片路径
	//商务介绍图片
	'UPLOADS_BUSINESSINTRO_PATH' => PUBLIC_PATH . 'Source/Businessintro/',//商务介绍图片路径
	//合作客户logo图片
	'UPLOADS_PARTNER_PATH' => PUBLIC_PATH . 'Source/Partner/',//合作客户logo图片路径
	//团队介绍人物图片
	'UPLOADS_TEAMINTRO_PATH' => PUBLIC_PATH . 'Source/Teamintro/',//团队介绍人物图片路径
	//官网新闻图片
	'UPLOADS_WEBNEWS_PATH' => PUBLIC_PATH . 'Source/Webnews/',//官网新闻图片路径
	//常见问题图片
	'UPLOADS_COMMONPROBLEM_PATH' => PUBLIC_PATH . 'Source/Commonproblem/',//常见问题图片路径
	//软件使用说明书图片
	'UPLOADS_SOFTINSTRUCTION_PATH' => PUBLIC_PATH . 'Source/Softinstruction/',//软件使用说明书图片路径
	//网站商品图片
	'UPLOADS_WEBGOODS_PATH' => PUBLIC_PATH . 'Source/Webgoods/',//网站商品图片路径
	//教学视频上传
	'UPLOADS_VIDEOTEACH_PATH' => PUBLIC_PATH . 'Source/Videoteach/',//网站教学视频路径
	'UPLOADS_VIDEO_EXT' => array("rm","rmvb","wmv","avi","3gp","mp4","flv","mpeg","mpg"),//视频类型
    'UPLOADS_VIDEO_SIZE' => '1000000000000000000',//视频大小限制
);







