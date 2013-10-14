<?php
define('FROM_INDEX', true);

require './includes/init.php';

//系统地址转换


//读取菜单项目
$result = $db->selectAll('navis');
$navis = array();
for ($i = 0; $i < $result->num_rows; $i++) {
	$tem = $result->fetch_assoc();
	$cat_res = 	$db->getCategory($tem['cat_id']);
	$cat_res_tem = $cat_res->fetch_assoc();
	$navis[$i]['name'] = $cat_res_tem['cat_name'];
	$navis[$i]['link'] = 'categories.php?id=' . $cat_res_tem['cat_id'];
}

$smarty->assign('navis', $navis);
$smarty->display('./smarty/templates/index.tpl');

