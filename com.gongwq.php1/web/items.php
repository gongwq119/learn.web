<?php
/**
 * 物品页面 入口
 */
// if (!defined('FROM_INDEX', TRUE)) {
// 	die('Hacking attemp');
// }

require './includes/init.php';

//URL参数id
$item_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;


//read from db
$result = $db->getItem($item_id);
$rows = $result->fetch_assoc();

//配置smarty,并输出
$smarty->assign('name', 'test'); 

$smarty->display(ROOT_PATH . '/smarty/templates/items.tpl');

?>


