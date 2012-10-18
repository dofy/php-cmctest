<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2009-3-5
 */
class Imgloop extends SevenModule
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'imgloop';
    }
    
    public function getList()
    {
        return $this->getAll("select * from $this->table");
    }

    public function addImage($url)
    {
        return $this->insert(array('url'=>$url));
    }
    
    public function getImage($url)
    {
        return $this->getCount('id', "where url='$url'");
    }

    public function showImage($id, $show)
    {
        return $this->update(array('show'=>$show), array('id'=>$id));
    }

    public function delImage($id)
    {
        return $this->delete(array('id' => $id));
    }

}
?>