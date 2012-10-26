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
        $this->models = array('users', 'message');
        parent::__construct();
    }

    public function indexAction()
    {
        $page = COMM::gets('page', 1);
        $this->assign('users', $this->Users->getList());
        
        $pager = new SevenPager($this->Users->pageInfo());
        $this->assign('page', $pager->createHtml('page'));
    }

    public function savepassAction()
    {
        $pass = COMM::posts('npass');
        $this->Users->savePass($pass);
        header('location: ?c=user&a=chgpass&m=ok');
    }

    public function saveAction()
    {
        $id = intval(COMM::posts('id'));

        $k['password'] = md5(COMM::posts('password'));
        $k['name']     = md5(COMM::posts('name'));
        $k['email']    = md5(COMM::posts('email'));
        $k['tel']      = md5(COMM::posts('tel'));
        $k['province'] = md5(COMM::posts('province'));
        $k['city']     = md5(COMM::posts('city'));
        $k['sex']      = md5(COMM::posts('sex'));
        $k['joinin']   = now();

        if($id <= 0)
        {
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
        $this->Message->delMyMessage($id);
        header('location: ?c=user');
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