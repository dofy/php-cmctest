<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class JobController extends SevenController
{
    public function __construct()
    {
        $this->models = array('news', 'page');
        parent::__construct();
    }

    public function indexAction()
    {
        $this->assign('title', '人力资源');
        $this->assign('content', $this->Page->getPage(5));
    }

    public function downloadAction()
    {
        $this->assign('title', '简历模板下载');
        $this->assign('content', $this->Page->getPage(6));
    }

    public function actionBefore()
    {
        $this->assign('cats', array(
            array('title'=>'人力资源', 'href'=>'?c=job'), 
            array('title'=>'简历模板下载', 'href'=>'?c=job&a=download')
            ));
        $this->assign('top10', $this->News->getTop(1, 10));
        $this->assign('contact', $this->Page->getPage('10'));
    }
}
?>