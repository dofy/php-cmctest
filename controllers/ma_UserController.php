<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class UserController extends SevenController
{
    public function __construct()
    {
        $this->models = array('users');
        parent::__construct();
    }

    public function indexAction()
    {
        $userid = intval(COMM::gets('id'));
        $user['level'] = 2;
        if($userid > 0)
        {
            $user = $this->Users->getUser($userid);
        }
        $this->assign('user', $user);
        $this->assign('users', $this->Users->getList());
    }

    public function chgpassAction()
    {
    }

    public function savepassAction()
    {
        $pass = COMM::posts('npass');
        $this->Users->savePass($pass);
        header('location: ?c=user&a=chgpass&m=ok');
    }

    public function saveAction()
    {
        $id = intval(COMM::posts('userid'));
        if($id <= 0 || COMM::posts('password') != '')
            $k['password'] = md5(COMM::posts('password'));
        if($id <= 0)
        {
            $k['level'] = 2;//COMM::posts('level');
            // add
            $has = $this->Users->getUserByName(COMM::posts('username'));
            if(is_array($has))
            {
                header('location: ?c=user&m=name');
                return;
            }
            $k['username'] = COMM::posts('username');
            $this->Users->addUser($k);

        }
        else
        {
            // update
            $this->Users->editUser($k, $id);
        }
        header('location: ?c=user&m=ok');
    }

    public function delAction()
    {
        $id = intval(COMM::gets('id'));
        $this->Users->delUser($id);
        header('location: ?c=user');
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