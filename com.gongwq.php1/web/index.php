<?php
define('FROM_INDEX', true);

require './includes/init.php';

//系统地址转换

$smarty->display('./smarty/templates/index.tpl');

