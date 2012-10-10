<?php

include(dirname(__FILE__) . '/../inc/config.php');
include(dirname(__FILE__) . '/../inc/utils.php');
include(dirname(__FILE__) . '/../inc/MySmarty.php');

header('content-charset:utf8');

$smarty = new MySmarty();

//$smarty->testInstall();

$smarty->display('index.tpl');
?>
