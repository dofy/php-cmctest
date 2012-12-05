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
        $this->models = array('users');
        parent::__construct();
    }

    public function indexAction()
    {
        $this->assign('title', '登录');
    }
    
    public function loginAction()
    {
        $username = COMM::posts('username');
        $password = COMM::posts('password');
        $user = $this->Users->checkUser($username, $password);
        if($user)
        {
            $this->Users->updateIp($user['id'], $_SERVER['REMOTE_ADDR'], $user['times']);
            
            $_SESSION['curuser']  = $user;
            
            header('Location:?c=user');
        }
        else
        {
            $_SESSION['curuser'] = false;
            header('Location:?c=login&m=登录失败, 请检查用户名密码是否正确.');
        }
    }

    public function registerAction()
    {
        $this->assign('title', '注册');
    }

    public function saveAction()
    {
        $id = intval(COMM::posts('id'));

        $rpass         = COMM::posts('rpass');
        $password      = COMM::posts('password');
        $k['username'] = trim(COMM::posts('username'));
        $k['name']     = trim(COMM::posts('name'));
        $k['email']    = trim(COMM::posts('email'));
        $k['tel']      = COMM::posts('tel');
        $k['province'] = COMM::posts('province');
        $k['city']     = COMM::posts('city');
        $k['addr']     = COMM::posts('addr');
        $k['postcode'] = COMM::posts('postcode');
        $k['sex']      = COMM::posts('sex');
        $k['joinin']   = 'now()';

        $msg = '';
        if(!preg_match('/^[a-z0-9_]{4,32}$/i', $k['username']))
        {
            $msg = '用户名只能用字母/数字/_(长度4~32)';
        }
        elseif(strlen($password) < 6)
        {
            $msg = '密码长度不能小于6';
        }
        elseif($password != $rpass)
        {
            $msg = '确认密码不一致';
        }
        elseif($k['name'] == '')
        {
            $msg = '请输入您的姓名';
        }
        elseif(strlen($k['email']) < 5 || strpos($k['email'], '@') === false || strpos($k['email'], '.') === false)
        {
            $msg = '请输入您的电子邮箱并检查格式是否正确';
        }

        if($msg != '')
        {
            header("location: ?c=login&a=register&m=$msg");
            return;
        }

        if($id <= 0)
        {
            // add
            $has = $this->Users->getUserByName($k['username']);
            if(is_array($has))
            {
                header('location: ?c=login&a=register&m=该用户已经存在');
                return;
            }
            $k['password'] = md5($password);
            $this->Users->addUser($k);
        }
        else
        {
            // update
            $this->Users->editUser($k, $id);
        }
        header('location: ?c=login&m=注册成功, 请登录.');
    }
    
    public function logoutAction()
    {
        COMM::clrSs();
        header('location: ?c=login');
    }

    public function actionBefore()
    {
        $this->assign('msg', COMM::gets('m', false));
    }
}
?>