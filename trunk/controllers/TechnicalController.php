<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2012/12/02 
 */

class TechnicalController extends SevenController
{
    public function __construct()
    {
        $this->models = array('news', 'page');
        parent::__construct();
    }

    public function indexAction()
    {
        $page = COMM::gets('page', 1);
        $this->assign('news', $this->News->getList($page, 2));
        
        $pager = new SevenPager($this->News->pageInfo());
        $this->assign('page', $pager->createHtml('page'));
    }

    public function articleAction()
    {
        $id = intval(COMM::gets('id', 0));
        $news = $this->News->getNews($id);
        $this->News->updateTimes($id, $news['times']);
        $this->assign('news', $news);
        $this->assign('older', $this->News->getOlder($news['id'], $news['cid'], $news['updated']));
        $this->assign('newer', $this->News->getNewer($news['id'], $news['cid'], $news['updated']));
    }

    public function businessAction()
    {
        $this->assign('title', '业务范围');
        $this->assign('content', $this->Page->getPage(4));
    }

    public function actionBefore()
    {
        $this->assign('title', '技术服务');
        $this->assign('cats', array(
            array('title'=>'技术服务', 'href'=>'?c=technical'), 
            array('title'=>'业务范围', 'href'=>'?c=technical&a=business')
            ));
        $this->assign('top10', $this->News->getTop(1, 10));
        $this->assign('contact', $this->Page->getPage('10'));
    }
}
?>