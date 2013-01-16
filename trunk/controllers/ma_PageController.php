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
        $this->assign('ids', 
            array(
                1 => '设备与能力', '关于腾芯', '公司荣誉', '业务范围', '人力资源', 
                     '简历模板下载', '联系我们', '首页.公司介绍', '首页.联系我们', '侧栏.联系我们'));
        $this->assign('m', COMM::gets('m'));
    }
}
?>