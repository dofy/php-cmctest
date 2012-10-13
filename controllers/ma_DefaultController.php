<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class DefaultController extends SevenController
{
    public function __construct($action)
    {
        $this->models = array('news');
        parent::__construct($action);
    }

    public function indexAction()
    {
    }

    public function beforeIndex()
    {
    }
}
?>