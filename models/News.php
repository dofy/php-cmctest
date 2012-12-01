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
    
    public function getList($page, $cid)
    {
        $this->getCount();
        return $this->getRows("select * from $this->table where cid=$cid order by updated desc", $page);
    }

    public function getTop($cid, $nums)
    {
        return $this->getAll("select id, title, updated from $this->table where cid=$cid order by updated desc limit $nums");
    }

    public function getNews($id)
    {
        return $this->getOne("select * from $this->table where id=$id");
    }

    public function getOlder($cid, $date)
    {
        return $this->getOne("select id, title from $this->table where cid=$cid and updated<'$date' order by updated desc");
    }

    public function getNewer($cid, $date)
    {
        return $this->getOne("select id, title from $this->table where cid=$cid and updated>'$date' order by updated asc");
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
}

?>