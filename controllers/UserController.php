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
        $this->models = array('users', 'message', 'news', 'page');
        parent::__construct();
    }

    public function indexAction()
    {
        $this->assign('title', '个人信息');
        
    }

    public function chgpassAction()
    {
        $this->assign('title', '修改密码');
    }

    public function orderAction()
    {
        $this->assign('title', '我的订单');
        $this->assign('order', $this->Page->getPage('1'));
    }

    public function messageAction()
    {
        $user = COMM::getSs('curuser');
        $this->assign('title', '我的留言');
        $this->assign('mymessage', $this->Message->getMyMessage($user['id']));
    }

    public function savepassAction()
    {
        $user = COMM::getSs('curuser');
        $opass = COMM::posts('opass');
        $npass = COMM::posts('npass');
        $rpass = COMM::posts('rpass');
        if(md5($opass) != $user['password'])
        {
            $msg = 'o';
        }
        elseif(strlen($npass) < 6)
        {
            $msg = 'n';
        }
        elseif($npass != $rpass)
        {
            $msg = 'r';
        }
        else
        {
            $this->Users->savePass($npass, $user['id']);
            $user['password'] = md5($npass);
            $_SESSION['curuser'] = $user;
            $msg = 'ok';
        }
        header("location: ?c=user&a=chgpass&m=$msg");
    }

    public function actionBefore()
    {
        if(COMM::getSs('curuser', false))
        {
            $this->assign('curuser', COMM::getSs('curuser'));
        }
        else
        {
            header('Location:?c=login');
        }
        $this->assign('cats', array(
            array('title'=>'个人信息', 'href'=>'?c=user'),
            array('title'=>'修改密码', 'href'=>'?c=user&a=chgpass'),
            array('title'=>'我的订单', 'href'=>'?c=user&a=order'),
            array('title'=>'我的留言', 'href'=>'?c=user&a=message')
            ));
        $this->assign('m', COMM::gets('m'));
        $this->assign('top10', $this->News->getTop(1, 10));
        $this->assign('contact', $this->Page->getPage('10'));
    }
}
?>