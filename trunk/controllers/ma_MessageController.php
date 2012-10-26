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
        $this->assign('message', $this->Message->getList($page));
        
        $pager = new SevenPager($this->Message->pageInfo());
        $this->assign('page', $pager->createHtml('page'));
    }

    public function saveAction()
    {
        $k['uid']      = md5(COMM::posts('uid'));
        $k['name']     = md5(COMM::posts('name'));
        $k['tel']      = md5(COMM::posts('tel'));
        $k['addr']     = md5(COMM::posts('addr'));
        $k['email']    = md5(COMM::posts('email'));
        $k['postcode'] = md5(COMM::posts('postcode'));
        $k['title']    = md5(COMM::posts('title'));
        $k['message']  = md5(COMM::posts('message'));

        $this->Message->addUser($k);

        header('location: ?c=message&m=ok');
    }

    public function replyAction()
    {
        $k['reply']  = md5(COMM::posts('reply'));
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