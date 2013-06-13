<?php
/*
 * 初始化平台
 * 1.加载库文件
 * 2.设定常量
 * 
 * Author:WQ.Gong
 * 
 */

// if (!defined('FROM_INDEX'))
// {
// 	die('Hacking attempt');
// }

error_reporting(E_ALL);

//确定根目录
if (__FILE__ == '')
{
	die('Fatal error code: 0');
}
define('BG_PATH', str_replace('includes/init.php', '', str_replace('\\', '/', __FILE__)));

//初始化PHP engine 变量
@ini_set('memory_limit',          '64M');
@ini_set('session.cache_expire',  180);
@ini_set('session.use_trans_sid', 0);
@ini_set('session.use_cookies',   1);
@ini_set('session.auto_start',    0);
@ini_set('display_errors',        1);

//加载库文件
require (ROOT_PATH . '/includes/lib_mysql.php');
require ('/opt/lampp/lib/php/Smarty/Smarty.class.php');

//创建log对象

//创建shop对象

//创建错误处理对象

//加载系统配置

//配置数据库
$db = new lib_mysql('localhost', 'root', 'passw0rd', 'mydb');
$db->setCharset();

//初始化smarty对象
$smarty = new Smarty();

$smarty->setTemplateDir('./smarty/templates');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->setCacheDir('./smarty/cache');
$smarty->setConfigDir('./smarty/configs');
$smarty->left_delimiter = '<{';
$smarty->right_delimiter = '}>';

?>