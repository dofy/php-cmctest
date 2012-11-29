<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class MessageController extends SevenController
{
    public function __construct()
    {
        $this->models = array('message');
        parent::__construct();
    }

    public function indexAction()
    {
        $page = COMM::gets('page', 1);
        $this->assign('messages', $this->Message->getList($page));
        
        $pager = new SevenPager($this->Message->pageInfo());
        $this->assign('page', $pager->createHtml('page'));
    }

    public function saveAction()
    {
        $k['uid']      = COMM::posts('uid');
        $k['title']    = COMM::posts('title');
        $k['message']  = COMM::posts('message');

        $this->Message->addUser($k);

        header('location: ?c=message&m=ok');
    }

    public function replyAction()
    {
        $k['reply']  = COMM::posts('reply');
        $this->Message->reply($message);
    }

    public function delAction()
    {
        $id = intval(COMM::gets('id'));
        $this->Message->delMessage($id);
        header('location: ?c=message');
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