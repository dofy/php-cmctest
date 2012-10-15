<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2012-10-13
 */
class News extends SevenModule
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getList($page = 1)
    {
        $this->db->getCount('news');
        return $this->db->getRows("select * from news", $page);
    }

    public function getNews($id)
    {
        return $this->db->getOne("select * from news where id=$id");
    }

    public function addNews($news)
    {
        return $this->db->insert('news', $news);
    }

    public function editNews($news, $id)
    {
        return $this->db->update('news', $news, array('id'=>$id));
    }

    public function delNews($id)
    {
        return $this->db->delete('news', array('id'=>$id));
    }
    
    public function pageInfo()
    {
        return $this->db->pageInfo();
    }
}

?>