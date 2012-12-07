<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class AboutController extends SevenController
{
    public function __construct()
    {
        $this->models = array('news', 'page');
        parent::__construct();
    }

    public function indexAction()
    {
        $this->assign('title', '关于腾芯');
        $this->assign('content', $this->Page->getPage(2));
    }

    public function honorAction()
    {
        $this->assign('title', '公司荣誉');
        $this->assign('content', $this->Page->getPage(3));
    }

    public function actionBefore()
    {
        $this->assign('curuser', COMM::getSs('curuser', false));
        $this->assign('cats', array(
            array('title'=>'关于腾芯', 'href'=>'?c=about'), 
            array('title'=>'公司荣誉', 'href'=>'?c=about&a=honor')
            ));
        $this->assign('top10', $this->News->getTop(1, 10));
        $this->assign('contact', $this->Page->getPage('10'));
    }
}
?>