<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class PageController extends SevenController
{
    public function __construct()
    {
        $this->models = array('page');
        parent::__construct();
    }

    public function indexAction()
    {
        $id = COMM::gets('id', 1);
        $this->assign('id', $id);
        $this->assign('page', $this->Page->getPage($id));
    }

    public function saveAction()
    {
        $id = intval(COMM::posts('id'));

        $content = COMM::posts('content');
        if($this->Page->getPage($id))
        {
            $this->Page->editPage($content, $id);
        }
        else
        {
            $this->Page->addPage($content, $id);
        }

        header("Location:?c=page&id=$id&m=ok");
    }

    public function beforeAction()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }

        $this->assign('ids', array(1 => '关于我们', '招聘信息'));
        $this->assign('m', COMM::gets('m'));
    }
}
?>