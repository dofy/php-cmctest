<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class DefaultController extends SevenController
{
    public function __construct($action)
    {
        parent::__construct($action);
    }

    public function indexAction()
    {
        $this->assign('user', $_SESSION['username']);
        $this->assign('lastip', $_SESSION['lastip']);
        $this->assign('updated', $_SESSION['updated']);
    }

    public function beforeAction()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }
    }
}
?>