<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class LinksController extends SevenController
{
    public function __construct()
    {
        $this->models = array('links');
        parent::__construct();
    }

    public function indexAction()
    {
        $this->assign('links', $this->Links->getList($page));
    }

    public function editAction()
    {
        $id = intval(COMM::gets('id', 0));
        if($id > 0)
        {
            $links = $this->Links->getLink($id);
        }
        $this->assign('links', $links);
    }

    public function delAction()
    {
        $id = intval(COMM::gets('id', 0));
        
        if($this->Links->delLink($id) > 0)
        {
            $this->assign('msg', '链接删除成功.');
        }
        else
        {
            $this->assign('msg', '链接删除失败, 可能链接不存在.');
        }
    }

    public function saveAction()
    {
        $id = intval(COMM::posts('id'));
        $k['title'] = trim(COMM::posts('title'));
        $k['href'] = trim(COMM::posts('href'));
        if($id <= 0)
        {
            // add
            $this->Links->addLink($k);
        }
        else
        {
            // update
            $this->Links->editLink($k, $id);
        }
        header("Location:?c=links&m=ok");
    }

    public function actionBefore()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }
        if($_SESSION['level'] > 1)
        {
            header('Location:?');
        }
        $this->assign('lvl', $_SESSION['level']);
        
        $this->assign('m', COMM::gets('m'));
    }
}
?>