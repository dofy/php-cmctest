<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class ProductController extends SevenController
{
    public function __construct()
    {
        $this->models = array('product', 'news', 'page');
        parent::__construct();
    }

    public function indexAction()
    {
        $page = COMM::gets('page', 1);
        $this->assign('product', $this->Product->getList($page, 1));
        
        $pager = new SevenPager($this->Product->pageInfo());
        $this->assign('page', $pager->createHtml('page'));
    }

    public function articleAction()
    {
        $id = intval(COMM::gets('id', 0));
        $product = $this->Product->getProduct($id);
        $this->assign('product', $product);
    }

    public function actionBefore()
    {
        $this->assign('title', '设备与能力');
        $this->assign('cats', array(
            array('title'=>'设备与能力', 'href'=>'?c=product')
            ));
        $this->assign('top10', $this->News->getTop(1, 10));
        $this->assign('contact', $this->Page->getPage('10'));
        $this->assign('curuser', COMM::getSs('curuser', false));
    }
}
?>