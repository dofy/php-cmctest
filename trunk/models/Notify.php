<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2009-3-5
 */
class Notify extends SevenModule
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'notify';
    }

    public function getUserList()
    {
        return $this->getAll("select count(n.id) as c, n.uid, u.username from `$this->table` as n left join `users` as u on n.uid = u.id where n.from=2 and n.readed = 0 group by n.uid");
    }

    public function getMyList($uid)
    {
        return $this->getOne("select count(id) as c from $this->table where `from` = 1 and readed = 0 and uid = $uid");
    }

    public function markAsRead($id)
    {
        return $this->update(array('readed'=>1), array('id'=>$id));
    }
    
    public function markAllAsRead($uid, $from)
    {
        return $this->update(array('readed'=>1), array('from'=>$from, 'uid'=>$uid));
    }

    public function addNotify($uid, $from)
    {
        return $this->insert(array('from'=>$from, 'uid'=>$uid));
    }

    public function delNotify($id)
    {
        return $this->delete(array('id' => $id));
    }

}
?>