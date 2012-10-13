<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2012/10/13
 */

class LoginController extends SevenController
{
    public function __construct($action)
    {
        $this->models = array('users');
        parent::__construct($action);
    }

    public function indexAction()
    {
    }
    
    public function loginAction()
    {
        $username = COMM::posts('username');
        $password = COMM::posts('password');
        $user = $this->Users->checkUser($username, $password);
        if($user)
        {
            $this->Users->updateIp($user['id'], $_SERVER['REMOTE_ADDR']);
            
            $_SESSION['islogin']  = true;
            $_SESSION['lastip']   = $user['lastip'];
            $_SESSION['id']       = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['level']    = $user['level'];
            
            header('Location:?');
        }
        else
        {
            $_SESSION['islogin'] = false;
            header('Location:?c=login&msg=error');
        }
    }

    public function beforeAction()
    {
    }
}
?>