<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2009-3-5
 */
class Users extends SevenModule
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }
    
    public function checkUser($username, $password)
    {
        $username = SevenDB::sqlstr($username);
        $password = SevenDB::sqlstr($password);
        return $this->getOne("select * from $this->table where `username` = '$username' and `password` = md5('$password')");
    }

    public function savePass($pass, $id)
    {
        return $this->update(array('password' => md5($pass)), array('id' =>$id));
    }
    
    public function getList()
    {
        $this->getCount();
        return $this->getRows("select * from $this->table");
    }

    public function getUser($id)
    {
        return $this->getOne("select * from $this->table where `id` = $id");
    }

    public function getUserByName($username)
    {
        return $this->getOne("select * from $this->table where `username` = '" . SevenDB::sqlstr($username) . "'");
    }

    public function addUser($user)
    {
        return $this->insert($user);
    }

    public function editUser($user, $id)
    {
        return $this->update($user, array('id'=>$id));
    }

    public function updateIP($id, $ip, $times)
    {
        return $this->update(array('lastip'=>$ip, 'times'=>$times+1), array('id' => $id));
    }

    public function delUser($id)
    {
        return $this->delete(array('id' => $id));
    }

}
?>