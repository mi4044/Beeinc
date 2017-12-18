<?php
// +----------------------------------------------------------------------
// | Author: 
// +----------------------------------------------------------------------

// 创建目录
function createFolder($path)
{
	if (!file_exists($path))
	{
		createFolder(dirname($path));
		mkdir($path, 0777);
	}
}

//定义项目名称和路径
define('APP_NAME', 'Web');
define('APP_PATH', './Web/');
define('PUBLIC_PATH', './Public/');
define('APP_DEBUG', true); //调试模式开关

// 运行环境目录
createFolder("./Runtime/Web/");

define('RUNTIME_PATH',"./Runtime/Web/");

// 加载框架入口文件
require("./ThinkPHP/ThinkPHP.php");
?>
