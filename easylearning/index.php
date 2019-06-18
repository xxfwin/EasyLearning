<?php

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");

defined('RUNTIME_PATH') or define('RUNTIME_PATH',   BASE_PATH.'Runtime/');   // 系统运行时目录
// 定义应用目录
define('APP_PATH','./App/');

if(file_exists("Install") && !file_exists("Install/install.lock")){
	header("Location:/Install");
	exit();
}


// 引入ThinkPHP入口文件
require './Core/ThinkPHP.php';

