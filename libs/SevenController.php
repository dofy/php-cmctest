<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */

class SevenController
{
    protected $view;
    protected $models;
    
    public function __construct()
    {
        if(count($this->models))
        {
            foreach($this->models as $model)
            {
                $model = ucfirst(strtolower($model));
                $m_file = __BASE_PATH . '..' . __DS . 'models' . __DS . $model . '.php';
                if(file_exists($m_file))
                {
                    include $m_file;
                    $this->$model = new $model;
                }
            }
        }
    }

    /**
     * 设定 view
     **/
    public function setView($view)
    {
        $this->view = $view;
    }
    
    /**
     * 绑定模板变量
     */
    public function assign($key, $value)
    {
        $this->view->assign($key, $value);
    }
    
    /**
     * 默认动作
     **/
    public function indexAction()
    {
        // nothing
    }
    
    /**
     * 执行动作前
     **/
    public function actionBefore()
    {
        // nothing
    }
    
    /**
     * 执行动作后
     **/
    public function actionAfter()
    {
        // nothing
    }
}
?>