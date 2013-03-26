<?php
require '../controller/demoContr.php';
require '../db/DataAccess.php';
echo 'hello world';
echo '<br/>';
// $demoController = new demoContr();
// $demoController->index();
$db = new DataAccess('localhost', 'root', '1', 'php');
$db->getRow("select * from `php`.`users`");
