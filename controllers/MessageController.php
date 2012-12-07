<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class MessageController extends SevenController
{
    public function __construct()
    {
        $this->models = array('news', 'page');
        parent::__construct();
    }

    public function indexAction()
    {
        $this->assign('title', '客户留言');
    }

    public function actionBefore()
    {
        $this->assign('cats', array(
            array('title'=>'客户留言', 'href'=>'?c=message'), 
            array('title'=>'查看留言', 'href'=>'?c=user&a=message')
            ));
        $this->assign('top10', $this->News->getTop(1, 10));
        $this->assign('contact', $this->Page->getPage('10'));
    }
}
?>