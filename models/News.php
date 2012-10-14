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
        return $this->db->getRows("select * from news", $page, 2);
    }
    
    public function pageInfo()
    {
        return $this->db->pageInfo();
    }
}

?>