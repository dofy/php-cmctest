<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class ManagerController extends SevenController
{
    public function __construct()
    {
        $this->models = array('manager');
        parent::__construct();
    }

    public function indexAction()
    {
        $id = intval(COMM::gets('id'));
        $manager['level'] = 2;
        if($id > 0)
        {
            $manager = $this->Manager->getManager($id);
        }
        $this->assign('manager', $manager);
        $this->assign('managers', $this->Manager->getList());
    }

    public function savepassAction()
    {
        $pass = COMM::posts('npass');
        $this->Manager->savePass($pass);
        header('location: ?c=manager&a=chgpass&m=ok');
    }

    public function saveAction()
    {
        $id = intval(COMM::posts('id'));
        if(COMM::posts('password') != '')
            $k['password'] = md5(COMM::posts('password'));
        $k['level'] = COMM::posts('level');
        if($id <= 0)
        {
            // add
            $has = $this->Manager->getManagerByName(COMM::posts('username'));
            if(is_array($has))
            {
                header('location: ?c=manager&m=name');
                return;
            }
            $k['username'] = COMM::posts('username');
            $this->Manager->addManager($k);
        }
        else
        {
            // update
            if($id == 1)
                $k['level'] = 1;
            $this->Manager->editManager($k, $id);
        }
        header('location: ?c=manager&m=ok');
    }

    public function delAction()
    {
        $id = intval(COMM::gets('id'));
        $this->Manager->delManager($id);
        header('location: ?c=manager');
    }

    public function actionBefore()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }
        if($_SESSION['level'] > 1 && COMM::gets('a') != 'chgpass' && COMM::gets('a') != 'savepass')
        {
            header('Location:?');
        }
        $this->assign('lvl', $_SESSION['level']);
        $this->assign('m', COMM::gets('m'));
        $this->assign('level_opt', array(1=>'超级管理员', 2=>'普通管理员'));
    }
}
?>