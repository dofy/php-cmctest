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
    
    public function checkUser($username, $password)
    {
        $username = $this->db->sqlstr($username);
        $password = $this->db->sqlstr($password);
        return $this->db->getOne("select * from `imgloop` where `username` = '$username' and `password` = md5('$password')");
    }

    public function savePass($pass)
    {
        return $this->db->query("update `imgloop` set `password` = md5('$pass') where `id` = $_SESSION[id]");
    }
    
    public function getList()
    {
        return $this->db->getAll('select * from `imgloop`');
    }

    public function getUser($id)
    {
        return $this->db->getOne("select * from `imgloop` where `id` = $id");
    }

    public function getUserByName($username)
    {
        return $this->db->getOne("select * from `imgloop` where `username` = '" . $this->db->sqlstr($username) . "'");
    }

    public function addUser($user)
    {
        return $this->db->insert('users', $user);
    }

    public function editUser($user, $id)
    {
        return $this->db->update('users', $user, array('id'=>$id));
    }

    public function updateIP($id, $ip)
    {
        $this->db->query("update `imgloop` set `updated` = now(), `lastip` = '$ip' where `id` = $id");
    }

    public function delUser($id)
    {
        return $this->db->query("delete from `imgloop` where id = $id");
    }

}
?>