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
        $this->models = array('news');
        parent::__construct();
    }

    public function indexAction()
    {
        $page = COMM::gets('page', 1);
        $this->assign('news', $this->News->getList($page, 1));
    }

    public function articleAction()
    {
        $id = intval(COMM::gets('id', 0));
        $news = $this->News->getNews($id);
        $this->assign('news', $news);
        $this->assign('older', $this->News->getOlder($news['cid'], $news['updated']));
        $this->assign('newer', $this->News->getNewer($news['cid'], $news['updated']));
    }

    public function actionBefore()
    {
        $this->assign('title', '公司动态');
        $this->assign('top10', $this->News->getTop(1, 10));
    }
}
?>