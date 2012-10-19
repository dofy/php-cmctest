<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2009-3-5
 */
class Page extends SevenModule
{
    public function __construct()
    {
        parent::__construct();
        $this-> = 'page';
    }

    public function getPage($id)
    {
        return $this->getOne("select * from $this->table where `id` = $id");
    }

    public function editPage($content, $id)
    {
        return $this->update(array('content'=>$content), array('id'=>$id));
    }

}
?>