<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2012/10/13
 */

class LoginController extends SevenController
{
    public function __construct()
    {
        $this->models = array('manager');
        parent::__construct();
    }

    public function indexAction()
    {
    }
    
    public function loginAction()
    {
        $username = COMM::posts('username');
        $password = COMM::posts('password');
        $user = $this->Manager->checkManager($username, $password);
        if($user)
        {
            $this->Manager->updateIp($user['id'], $_SERVER['REMOTE_ADDR']);
            
            $_SESSION['islogin']  = true;
            $_SESSION['lastip']   = $user['lastip'];
            $_SESSION['updated']  = $user['updated'];
            $_SESSION['id']       = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['level']    = $user['level'];
            
            header('Location:?');
        }
        else
        {
            $_SESSION['islogin'] = false;
            $this->assign('msg', '登录失败.');
        }
    }
    
    public function logoutAction()
    {
        COMM::clrSc();
        header('location: ?c=login');
    }

    public function beforeAction()
    {
    }
}
?>