<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class DefaultController extends SevenController
{
    public function __construct()
    {
        $this->models = array('news');
        parent::__construct();
    }

    public function indexAction()
    {
        echo 'index test';
    }

    public function tttAction()
    {
        echo 'ttt action';
    }

    public function beforeAction()
    {
        echo 'befor--';
    }
}
?>