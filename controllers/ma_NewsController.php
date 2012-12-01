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
        $cid = COMM::gets('cid', 1);
        $page = COMM::gets('page', 1);
        
        $this->assign('cid', $cid);
        $this->assign('news', $this->News->getList($page, $cid));
        
        $pager = new SevenPager($this->News->pageInfo());
        $this->assign('page', $pager->createHtml('page'));
    }

    public function editAction()
    {
        $id = intval(COMM::gets('id', 0));
        $this->assign('cid', COMM::gets('cid', 1));
        if($id > 0)
        {
            $news = $this->News->getNews($id);
        }
        else
        {
            $news['updated'] = date('Y-m-d');
        }
        $this->assign('news', $news);
    }

    public function delAction()
    {
        $id = intval(COMM::gets('id', 0));
        
        if($this->News->delNews($id) > 0)
        {
            $this->assign('msg', '新闻删除成功.');
        }
        else
        {
            $this->assign('msg', '新闻删除失败, 可能新闻不存在.');
        }
    }

    public function saveAction()
    {
        $id = intval(COMM::posts('id'));
        $k['cid'] = COMM::posts('cid', 1);
        $k['title'] = COMM::posts('title');
        $k['content'] = COMM::posts('content');
        $k['updated'] = COMM::posts('Date_Year') . '-' . COMM::posts('Date_Month') . '-' . COMM::posts('Date_Day');
        if($id <= 0)
        {
            // add
            $this->News->addNews($k);
        }
        else
        {
            // update
            $this->News->editNews($k, $id);
        }
        header("Location:?c=news&cid=" . $k['cid'] . "&m=ok");
    }

    public function actionBefore()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }
        
        $this->assign('ids', array(1 => '公司动态', '技术服务'));
        $this->assign('m', COMM::gets('m'));
    }
}
?>