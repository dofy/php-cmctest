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
        $this-> = 'users';
    }
    
    public function checkUser($username, $password)
    {
        $username = SevenDB::sqlstr($username);
        $password = SevenDB::sqlstr($password);
        return $this->getOne("select * from `users` where `username` = '$username' and `password` = md5('$password')");
    }

    public function savePass($pass)
    {
        return $this->update(array('password' => md5($pass)), array('id' => $_SESSION[id]));
    }
    
    public function getList()
    {
        return $this->getAll('select * from `users`');
    }

    public function getUser($id)
    {
        return $this->getOne("select * from `users` where `id` = $id");
    }

    public function getUserByName($username)
    {
        return $this->getOne("select * from `users` where `username` = '" . $this->sqlstr($username) . "'");
    }

    public function addUser($user)
    {
        return $this->insert($user);
    }

    public function editUser($user, $id)
    {
        return $this->update($user, array('id'=>$id));
    }

    public function updateIP($id, $ip)
    {
        $this->update(array('lastip' => $ip), array('id' => $id));
    }

    public function delUser($id)
    {
        return $this->delete(array('id' => $id));
    }

}
?>