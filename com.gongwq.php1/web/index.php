<?php
require '../controller/demoContr.php';
require '../controller/simpleContr.php';
require '../db/DataAccess.ph';
echo '<h1>hello world<h1>';
echo '<br/>';
echo '<br/>';
echo '<br/>';
// $demoController = new demoContr();
// $demoController->index();
$dbInstance = new DataAccess($host, $user, $pwd, $dbname)
$controller = new simpleContr($dao);
