<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class DefaultController extends SevenController
{
    public function __construct()
    {
        $this->models = array('notify');
        parent::__construct();
    }

    public function indexAction()
    {
        $this->assign('user', $_SESSION['username']);
        $this->assign('lastip', $_SESSION['lastip']);
        $this->assign('updated', $_SESSION['updated']);
    }

    public function actionBefore()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }
        
        $this->assign('notify', $this->Notify->getUserList());
        $this->assign('lvl', $_SESSION['level']);
    }
}
?>