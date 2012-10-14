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
        $page = COMM::gets('page', 1);
        $this->view->assign('news', $this->News->getList($page));
        
        $pager = new SevenPager($this->News->pageInfo());
        $this->view->assign('page', $pager->createHtml('page', 1));
    }

    public function beforeAction()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }
    }
}
?>