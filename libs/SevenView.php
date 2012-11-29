<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

/**
 * 视图类
 **/
class SevenView extends Smarty
{
    public function __construct()
    {
        parent::__construct();
		self::init();
    }
	
	private function init()
	{
        $this->setTemplateDir(dirname(__FILE__) . '/../templates/');
        $this->setCompileDir(dirname(__FILE__) . '/../templates_c/');
        $this->setConfigDir(dirname(__FILE__) . '/../configs/');
        $this->setCacheDir(dirname(__FILE__) . '/../cache/');
        
        //$this->caching = true;

        //$this->debugging = true;
	}
}
?>