<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 
 * Update:  
 */

include(dirname(__FILE__) . '/../libs/Smarty.class.php');

class MySmarty extends Smarty
{
    public function __construct()
    {
        parent::__construct();

        $this->setTemplateDir(dirname(__FILE__) . '/../templates/');
        $this->setCompileDir(dirname(__FILE__) . '/../templates_c/');
        $this->setConfigDir(dirname(__FILE__) . '/../configs/');
        $this->setCacheDir(dirname(__FILE__) . '/../cache/');
        
        $this->debugging = true;
    }
}

?>