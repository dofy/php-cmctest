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
        $this->models = array('news', 'page', 'message');
        parent::__construct();
    }

    public function indexAction()
    {
        $this->assign('msg', COMM::gets('m'));
    }

    public function saveAction()
    {
        if(!COMM::getSs('curuser', false))
        {
            header('location: ?c=message');
        }
        else
        {
            $curuser = COMM::getSs('curuser', false);
            $title   = trim(COMM::posts('title'));
            $message = trim(COMM::posts('message'));

            if($title == '' || $message == '')
            {
                header('location: ?c=message&m=t');
            }
            else
            {
                $this->Message->addMessage(array('title'=>$title, 'message'=>$message, 'uid'=>$curuser['id']));
                header('location: ?c=message&m=ok');
            }
        }
    }

    public function actionBefore()
    {
        $this->assign('title', '客户留言');
        $this->assign('cats', array(
            array('title'=>'客户留言', 'href'=>'?c=message'), 
            array('title'=>'查看留言', 'href'=>'?c=user&a=message')
            ));
        $this->assign('top10', $this->News->getTop(1, 10));
        $this->assign('contact', $this->Page->getPage('10'));
        $this->assign('curuser', COMM::getSs('curuser', false));
    }
}
?>