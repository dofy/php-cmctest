<?php
session_start();

// include files
include dirname(__FILE__) . '/../libs/SevenApplication.php';

// new controller
$app = new SevenApplication('c', 'a', 'ma_');

// init
$app->init();


?>