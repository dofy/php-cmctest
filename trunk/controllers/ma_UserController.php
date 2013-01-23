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
        $this->models = array('users', 'message', 'notify');
        parent::__construct();
    }

    public function indexAction()
    {
        $page = COMM::gets('page', 1);
        $this->assign('users', $this->Users->getList());
        
        $pager = new SevenPager($this->Users->pageInfo());
        $this->assign('page', $pager->createHtml('page'));
    }
    
    public function passedAction()
    {
        $id = intval(COMM::gets('id'));
        $passed = intval(COMM::gets('passed'));
        $this->Users->setPassed($passed, $id);
        header("location: ?c=user");
    }
    
    public function chgpassAction()
    {
        $this->assign('id', COMM::gets('id'));
        $this->assign('name', COMM::gets('name'));
    }

    public function savepassAction()
    {
        $id = intval(COMM::gets('id'));
        $pass = COMM::posts('npass');
        $this->Users->savePass($pass, $id);
        header("location: ?c=user&a=chgpass&id=$id&m=ok");
    }

    public function saveAction()
    {
        $id = intval(COMM::posts('id'));

        $k['password'] = md5(COMM::posts('password'));
        $k['name']     = COMM::posts('name');
        $k['email']    = COMM::posts('email');
        $k['tel']      = COMM::posts('tel');
        $k['province'] = COMM::posts('province');
        $k['city']     = COMM::posts('city');
        $k['addr']     = COMM::posts('addr');
        $k['postcode'] = COMM::posts('postcode');
        $k['sex']      = COMM::posts('sex');
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
    
    public function filesAction()
    {
        $id = intval(COMM::gets('id'));
        $this->assign('user', $this->Users->getUser($id));
        $this->assign('name', COMM::gets('name'));
        
        $this->Notify->markAllAsRead($id, 2);
        
        $this->assign('inbox', $this->Users->getInbox($id));
        $this->assign('outbox', $this->Users->getOutbox($id));
    }
    
    public function uploadAction()
    {
        $id = intval(COMM::gets('id'));
        
        $folder = 'files/' . $id . '/inbox';
        $uploader = new SevenUploader(
                        array('jpg', 'jpeg', 'gif', 'png', 'swf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'txt', 'zip', 'rar', '7z'),
                        'user_file', 200000000);
        $result = $uploader->upload($folder, SevenUploader::AUTO_INDEX);
        
        if($result['code'] == 0)
        {
            $this->Notify->addNotify($id, 1);
        }
        
        header("location: ?c=user&a=files&id=$id&m=" . $result['msg']);
    }

    public function downloadAction()
    {
        $id = intval(COMM::gets('id'));
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
        $id = intval(COMM::gets('id'));
        $dir = COMM::gets('d');
        $file = COMM::gets('f');
        
        $m = $this->Users->delFile($id, $dir, $file) ? '删除成功.' : '删除失败.';
        
        header("location: ?c=user&a=files&id=$id&m=$m");
    }

    public function delAction()
    {
        $id = intval(COMM::gets('id'));
        $this->Users->delUser($id);
        $this->Users->delFiles($id);
        $this->Message->delMyMessage($id);
        header('location: ?c=user');
    }

    public function actionBefore()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }
        $this->assign('lvl', $_SESSION['level']);
        $this->assign('m', COMM::gets('m'));
    }
}
?>