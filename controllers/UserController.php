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
        $this->models = array('users', 'message', 'notify', 'news', 'page', 'product');
        parent::__construct();
    }

    public function indexAction()
    {
        $this->assign('title', '个人信息');
        
        $user = COMM::getSs('curuser');
        $this->assign('notify', $this->Notify->getMyList($user['id']));
    }

    public function chgpassAction()
    {
        $this->assign('title', '修改密码');
    }

    public function orderAction()
    {
        $user = COMM::getSs('curuser');
        $this->assign('title', '我的订单');
        $this->assign('order', $this->Page->getPage('1'));
        
        $this->Notify->markAllAsRead($user['id'], 1);
        
        $this->assign('inbox', $this->Users->getInbox($user['id']));
        $this->assign('outbox', $this->Users->getOutbox($user['id']));
    }
    
    public function uploadAction()
    {
        $user = COMM::getSs('curuser');
        $id = $user['id'];
        $folder = 'files/' . $id . '/outbox';
        $uploader = new SevenUploader(
                        array('jpg', 'jpeg', 'gif', 'png', 'swf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'txt', 'zip', 'rar', '7z'),
                        'user_file', 200000000);
        $result = $uploader->upload($folder, SevenUploader::AUTO_INDEX);
        
        if($result['code'] == 0)
        {
            $this->Notify->addNotify($id, 2);
        }
        
        header("location: ?c=user&a=order&m=" . $result['msg']);
    }

    public function downloadAction()
    {
        $user = COMM::getSs('curuser');
        $id = $user['id'];
        $dir = COMM::gets('d');
        $file = COMM::gets('f');

        $f = $this->Users->getFile($id, $dir, $file);

        header("Content-disposition: attachment; filename=" . base64_decode($file));
        header("Content-type: application/octet-stream");
        header("Content-Length: " . filesize($f));
        ob_clean();
        readfile($f);
        exit;
    }
    
    public function delfileAction()
    {
        $user = COMM::getSs('curuser');
        $id = $user['id'];
        $file = COMM::gets('f');
        
        $m = $this->Users->delFile($id, 'outbox', $file) ? '删除成功.' : '删除失败.';
        
        header("location: ?c=user&a=order&m=$m");
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
        $user = COMM::getSs('curuser', false);
        if($user)
        {
            $this->assign('curuser', $user);
        }
        else
        {
            header('Location:?c=login');
        }
        $cats = array(
            array('title'=>'个人信息', 'href'=>'?c=user'),
            array('title'=>'修改密码', 'href'=>'?c=user&a=chgpass'),
            array('title'=>'我的留言', 'href'=>'?c=user&a=message')
            );
        if($user['passed'])
        {
            array_push($cats, array('title'=>'我的订单', 'href'=>'?c=user&a=order'));
        }
        $this->assign('cats', $cats);
        $this->assign('m', COMM::gets('m'));
        $this->assign('top10', $this->News->getTop(1, 10));
        $this->assign('ptop6', $this->Product->getTop(1, 6));
        $this->assign('contact', $this->Page->getPage('10'));
    }
}
?>