<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class ImgloopController extends SevenController
{
    public function __construct($action)
    {
        $this->models = array('imgloop');
        parent::__construct($action);
    }

    public function indexAction()
    {
        $this->view->assign('imgs', $this->Imgloop->getList());
    }
    
    public function saveAction()
    {
        header('location: ?c=imgloop&m=ok');
    }

    public function delAction()
    {
        $id = intval(COMM::gets('id'));
        $this->Imgloop->delImg($id);
        header('location: ?c=imgloop');
    }

    public function beforeAction()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }
        $this->view->assign('m', COMM::gets('m'));
    }
}
?>