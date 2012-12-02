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
        $this->assign('content', $this->Page->getPage(5));
    }

    public function showAction()
    {
        $this->assign('title', '查看留言');
        $this->assign('content', $this->Page->getPage(5));
    }

    public function actionBefore()
    {
        $this->assign('cats', array(
            array('title'=>'客户留言', 'href'=>'?c=message'), 
            array('title'=>'查看留言', 'href'=>'?c=message&a=show')
            ));
        $this->assign('top10', $this->News->getTop(1, 10));
    }
}
?>