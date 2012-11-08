<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2012/10/24 
 */

class ProductController extends SevenController
{
    public function __construct()
    {
        $this->models = array('product');
        parent::__construct();
    }

    public function indexAction()
    {
        $page = COMM::gets('page', 1);
        $this->assign('product', $this->Product->getList($page));
        
        $pager = new SevenPager($this->Product->pageInfo());
        $this->assign('page', $pager->createHtml('page'));
    }

    public function editAction()
    {
        $id = intval(COMM::gets('id', 0));
        if($id > 0)
        {
            $product = $this->Product->getProduct($id);
        }
        $this->assign('product', $product);
    }

    public function delAction()
    {
        $id = intval(COMM::gets('id', 0));
        
        if($this->Product->delProduct($id) > 0)
        {
            $this->assign('error', 0);
            $this->assign('id', $id);
        }
        else
        {
            $this->assign('error', 1);
            $this->assign('msg', '产品删除失败, 可能产品不存在.');
        }
    }

    public function saveAction()
    {
        $id = intval(COMM::posts('id'));

        $k['cid'] = COMM::posts('cid', 1);
        $k['url'] = COMM::posts('url');
        $k['title'] = COMM::posts('title');
        $k['content'] = COMM::posts('content');
        if($id <= 0)
        {
            // add
            $this->Product->addProduct($k);
        }
        else
        {
            // update
            $this->Product->editProduct($k, $id);
        }
        header('Location:?c=product&m=ok');
    }

    public function beforeAction()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }

        $this->assign('m', COMM::gets('m'));
    }
}
?>