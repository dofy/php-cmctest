<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class ImgloopController extends SevenController
{
    public function __construct($action)
    {
        $this->models = array('imgloop');
        parent::__construct($action);
    }

    public function indexAction()
    {
        $this->assign('imgs', $this->Imgloop->getList());
    }
    
    public function showAction()
    {
        $id   = intval(COMM::gets('id'));
        $show = intval(COMM::gets('show')) == 0 ? 1 : 0;
        
        if($this->Imgloop->showImage($id, $show))
        {
            $this->assign('error', 0);
            $this->assign('id', $id);
            $this->assign('show', $show);
        }
        else
        {
            $this->assign('error', 1);
            $this->assign('msg', '错误, 可能图片不存在.');
        }
    }
    
    public function addAction()
    {
        $url = COMM::gets('url');
        
        if($this->Imgloop->getImage($url))
        {
            $this->assign('error', 1);
            $this->assign('msg', '图片已经存在.');
        }
        else
        {
            $id = $this->Imgloop->addImage($url);
            
            $this->assign('error', 0);
            $this->assign('id', $id);
            $this->assign('url', $url);
        }
    }

    public function delAction()
    {
        $id = intval(COMM::gets('id'));
        if($this->Imgloop->delImage($id))
        {
            $this->assign('error', 0);
            $this->assign('id', $id);
        }
        else
        {
            $this->assign('error', 1);
            $this->assign('msg', '错误, 可能图片不存在.');
        }
    }

    public function beforeAction()
    {
        if(!COMM::getSs('islogin'))
        {
            header('Location:?c=login');
        }
    }
}
?>