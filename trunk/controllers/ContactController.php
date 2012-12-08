<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class ContactController extends SevenController
{
    public function __construct()
    {
        $this->models = array('news', 'page');
        parent::__construct();
    }

    public function indexAction()
    {
        $this->assign('title', '联系我们');
        $this->assign('content', $this->Page->getPage(7));
    }

    public function actionBefore()
    {
        $this->assign('cats', array(
            array('title'=>'联系我们', 'href'=>'?c=contact')
            ));
        $this->assign('top10', $this->News->getTop(1, 10));
        $this->assign('contact', $this->Page->getPage('10'));
        $this->assign('curuser', COMM::getSs('curuser', false));
    }
}
?>