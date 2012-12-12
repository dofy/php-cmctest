<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2012-10-13
 */
class Links extends SevenModule
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'links';
    }
    
    public function getList()
    {
        return $this->getAll("select * from $this->table");
    }

    public function getLink($id)
    {
        return $this->getOne("select * from $this->table where id=$id");
    }

    public function addLink($link)
    {
        return $this->insert($link);
    }

    public function editLink($link, $id)
    {
        return $this->update($link, array('id'=>$id));
    }

    public function delLink($id)
    {
        return $this->delete(array('id'=>$id));
    }
}

?>