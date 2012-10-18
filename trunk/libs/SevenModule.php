<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */
class SevenModule
{
    protected $db;
    protected $table;
    
    protected function __construct()
    {
        $this->db = new SevenDB('localhost', 'root', '', 'cmctest');
        //$this->db->debug = true;
    }

    protected function insert($object)
    {
        return $this->db->insert($this->table, $object);
    }

    protected function update($object, $which)
    {
        return $this->db->update($this->table, $object, $which);
    }

    protected function delete($which)
    {
        return $this->db->delete($this->table, $which);
    }

    protected function getAll($sql)
    {
        return $this->db->getAll($sql);
    }

    protected function getCount($key = 'id', $others = null)
    {
        return $this->db->getCount($this->table, $key, $others);
    }

    protected function getRows($sql, $page = 1, $pagesize = 20)
    {
        return $this->db->getRows($sql, $page, $pagesize);
    }

    protected function getOne($sql)
    {
        return $this->db->getOne($sql);
    }

    protected function pageInfo()
    {
        return $this->db->pageInfo();
    }
}
?>