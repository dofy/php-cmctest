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
        $this->table = 'news';
    }
    
    public function getList($page)
    {
        $this->getCount();
        return $this->getRows("select * from $this->table", $page);
    }

    public function getNews($id)
    {
        return $this->getOne("select * from $this->table where id=$id");
    }

    public function addNews($news)
    {
        return $this->insert($news);
    }

    public function editNews($news, $id)
    {
        return $this->update($news, array('id'=>$id));
    }

    public function delNews($id)
    {
        return $this->delete(array('id'=>$id));
    }
    
    public function pageInfo()
    {
        return parent::pageInfo();
    }
}

?>