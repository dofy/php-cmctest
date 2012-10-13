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
    
    public function getList()
    {
        $this->db->select('news');
    }
}

?>