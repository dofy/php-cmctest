<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class managerController extends SevenController
{
    public function __construct($action)
    {
        $this->models = array('manager');
        parent::__construct($action);
    }

    public function indexAction()
    {
        $id = intval(COMM::gets('id'));
        $manager['level'] = 2;
        if($id > 0)
        {
            $manager = $this->Manager->getmanager($id);
        }
        $this->assign('manager', $manager);
        $this->assign('managers', $this->Manager->getList());
    }

    public function chgpassAction()
    {
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
        if($id <= 0 || COMM::posts('password') != '')
            $k['password'] = md5(COMM::posts('password'));
        if($id <= 0)
        {
            $k['level'] = 2;//COMM::posts('level');
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

    public function beforeAction()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }
        $this->assign('m', COMM::gets('m'));
        $this->assign('level_opt', array(1=>'管理员', 2=>'普通用户'));
    }
}
?>