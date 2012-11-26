<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2009-3-5
 */
class Message extends SevenModule
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'message';
    }

    public function getList($page)
    {
        $this->getCount();
        return $this->getRows("select m.*, u.username from `$this->table` as m left join `users` as u on m.uid = u.id order by updated desc", $page);
    }

    public function getMyMessage($uid)
    {
        return $this->getAll("select * from $this->table where uid = $uid order by updated desc");
    }

    public function getMessage($id)
    {
        return $this->getOne("select * from $this->table where id=$id");
    }

    public function addMessage($message)
    {
        return $this->insert($message);
    }

    public function reply($id, $reply)
    {
        return $this->update(array('reply'=>$reply), array('id'=>$id));
    }

    public function delMessage($id)
    {
        return $this->delete(array('id' => $id));
    }

    public function delMyMessage($uid)
    {
        return $this->delete(array('uid' => $uid));
    }

}
?>