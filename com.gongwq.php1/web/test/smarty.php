<?php

// test smarty
require('/opt/lampp/lib/php/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('../smarty/templates');
$smarty->setCompileDir('../smarty/templates_c');
$smarty->setCacheDir('../smarty/cache');
$smarty->setConfigDir('../smarty/configs');
$smarty->left_delimiter = '<{';
$smarty->right_delimiter = '}>';

$smarty->assign('name', 'gongwq');
$no = array();
$no['k1'] = 'k1_v';
$no['k2'] = 'k2_v';
$no['k3'] = 'k3_v';
$smarty->assign('no', '');
$smarty->display('index.tpl');
// $smarty->testInstall();


?>