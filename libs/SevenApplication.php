<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

include dirname(__FILE__) . '/includes.php';

class SevenApplication
{
    private $cflag;
    private $aflag;
    private $pre;
    private $controller;
    private $view;
    
    /**
     * Application
     * @param   String  $cflag   控制器键名
     * @param   String  $aflag   动作器键名
     **/
    public function __construct($cflag = 'c', $aflag = 'a', $pre = null)
    {
        $this->cflag = $cflag;
        $this->aflag = $aflag;

        $this->pre = $pre;
    }
    
    /**
     * 初始化(框架核心)
     **/
    public function run()
    {
        // 取 controller
        if(isset($_REQUEST[$this->cflag]))
        {
            $c = ucfirst(strtolower(trim($_REQUEST[$this->cflag])));
        }
        
        if(empty($c))
        {
            $c = 'Default';
        }

        $cn = $c . 'Controller';
        $cf = __BASE_PATH . '..' . __DS . 'controllers' . __DS . $this->pre . $cn . '.php';
        
        // 判断类文件是否存在, 不存在, 报错
        if(!file_exists($cf))
            die('类文件不存在: <em>' . $cf . '</em>');
        
        // 取 action
        if(isset($_REQUEST[$this->aflag]))
        {
            $a = strtolower(trim($_REQUEST[$this->aflag]));
        }
        
        if(empty($a))
        {
            $a = 'index';
        }
        
        $an = $a . 'Action';
        
        // 类存在, 引入并创建类
        include($cf);
        $this->controller = new $cn($a);
        
        // 判断方法是否存在, 不存在默认执行 index 方法
        if(!method_exists($this->controller, $an))
        {
            $a  = 'index';
            $an = 'indexAction';
        }
        
        // 获取模板文件
        $tpl_file = $this->pre . strtolower($c) . __DS . $a . '.tpl';
        
        // 加载模板
        $this->view = new SevenView();
        $this->view->assign('__controller', ucfirst($c));
        $this->view->assign('__action', ucfirst($a));
        
        $this->controller->setView($this->view);
        // 执行 Action
        $this->controller->beforeAction();
        $this->controller->$an();
        $this->controller->afterAction();
        
        // 渲染模板
        @$this->view->display($tpl_file);
    }
}
?>