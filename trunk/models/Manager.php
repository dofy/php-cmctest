<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2009-3-5
 */
class Manager extends SevenModule
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'manager';
    }
    
    public function checkManager($managername, $password)
    {
        $managername = SevenDB::sqlstr($managername);
        $password = SevenDB::sqlstr($password);
        return $this->getOne("select * from $this->table where `username` = '$managername' and `password` = md5('$password')");
    }

    public function savePass($pass)
    {
        return $this->update(array('password'=>md5($pass)), array('id'=>$_SESSION[id]));
    }
    
    public function getList()
    {
        return $this->getAll("select * from $this->table");
    }

    public function getManager($id)
    {
        return $this->getOne("select * from $this->table where `id` = $id");
    }

    public function getManagerByName($managername)
    {
        return $this->getOne("select * from $this->table where `username` = '" . SevenDB::sqlstr($managername) . "'");
    }

    public function addManager($manager)
    {
        return $this->insert($this->table, $manager);
    }

    public function editManager($manager, $id)
    {
        return $this->update($this->table, $manager, array('id'=>$id));
    }

    public function updateIP($id, $ip)
    {
        $this->query("update $this->table set `updated` = now(), `lastip` = '$ip' where `id` = $id");
    }

    public function delManager($id)
    {
        return $this->query("delete from $this->table where id = $id");
    }

}
?>