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
        $this->models = array('news', 'imgloop', 'page');
        parent::__construct();
    }

    public function indexAction()
    {
        $this->assign('title', '首页');
        $this->assign('news', $this->News->getTop(1, 3));
        $this->assign('imgs', $this->Imgloop->getShow());
        $this->assign('about', $this->Page->getPage('8'));
        $this->assign('contact', $this->Page->getPage('9'));
        $this->assign('curuser', COMM::getSs('curuser', false));
    }
}
?>