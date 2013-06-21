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
$no['a1']['b1']['c1'] = 'k1_v';
$no['a2']['b2']['c2'] = 'k2_v';
$no['a3']['b3']['c3'] = 'k3_v';
$smarty->assign('no', $no);
$smarty->display('index.tpl');
// $smarty->testInstall();


?>