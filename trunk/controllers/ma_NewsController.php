<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class NewsController extends SevenController
{
    public function __construct($action)
    {
        $this->models = array('news');
        parent::__construct($action);
    }

    public function indexAction()
    {
        $this->News;
    }

    public function beforeAction()
    {
        if(!COMM::getSs('islogin'))
        {
            //header('Location:?c=login');
        }
    }
}
?>