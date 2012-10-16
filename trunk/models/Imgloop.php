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
    }
    
    public function getList()
    {
        return $this->db->getAll('select * from `imgloop`');
    }

    public function addImage($url)
    {
        return $this->db->insert('imgloop', array('url'=>$url));
    }
    
    public function getImage($url)
    {
        return $this->db->getCount('imgloop', 'id', "where url='$url'");
    }

    public function showImage($id, $show)
    {
        return $this->db->update('imgloop', array('show'=>$show), array('id'=>$id));
    }

    public function delImage($id)
    {
        return $this->db->delete('imgloop', array('id' => $id));
    }

}
?>