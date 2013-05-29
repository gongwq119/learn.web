<?php
/*
 * 
 * 初始化平台
 * 1.加载库文件
 * 2.设定常量
 * 
 * Author:WQ.Gong
 * 
 */

if (!defined('FROM_INDEX'))
{
	die('Hacking attempt');
}

//确定根目录
define('ROOT', str_replace($search, $replace, $subject))

//初始化PHP engine 变量
@ini_set('memory_limit',          '64M');
@ini_set('session.cache_expire',  180);
@ini_set('session.use_trans_sid', 0);
@ini_set('session.use_cookies',   1);
@ini_set('session.auto_start',    0);
@ini_set('display_errors',        1);

//加载库文件

//创建log对象

//创建shop对象

//创建错误处理对象

//加载系统配置

//初始化smarty对象


?>