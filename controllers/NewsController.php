<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class NewsController extends SevenController
{
    public function __construct()
    {
        $this->models = array('news', 'page', 'product');
        parent::__construct();
    }

    public function indexAction()
    {
        $page = COMM::gets('page', 1);
        $this->assign('news', $this->News->getList($page, 1));
        
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

    public function actionBefore()
    {
        $this->assign('title', '公司动态');
        $this->assign('cats', array(
            array('title'=>'公司动态', 'href'=>'?c=news')
            ));
        $this->assign('top10', $this->News->getTop(1, 10));
        $this->assign('ptop6', $this->Product->getTop(1, 6));
        $this->assign('contact', $this->Page->getPage('10'));
        $this->assign('curuser', COMM::getSs('curuser', false));
    }
}
?>