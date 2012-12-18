<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

define ('__DS', DIRECTORY_SEPARATOR);
define ('__BASE_PATH', dirname(__file__) . __DS);

// smarty
include __BASE_PATH . 'Smarty.class.php';

// core
include __BASE_PATH . 'SevenCOMM.php';
include __BASE_PATH . 'SevenDB.php';
include __BASE_PATH . 'SevenPager.php';
include __BASE_PATH . 'SevenView.php';
include __BASE_PATH . 'SevenModule.php';
include __BASE_PATH . 'SevenController.php';

include __BASE_PATH . 'SevenUploader.php';

include __BASE_PATH . 'SevenLog.php';

?>