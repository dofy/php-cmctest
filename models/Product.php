<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  2009-3-5
 */
class Product extends SevenModule
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'product';
    }

    public function getList($page, $cid)
    {
        $this->getCount();
        return $this->getRows("select * from $this->table where `cid` = $cid order by id desc", $page);
    }

    public function getProduct($id)
    {
        return $this->getOne("select * from $this->table where `id` = $id");
    }

    public function getTop($cid, $nums)
    {
        return $this->getAll("select id, url, title from $this->table where cid=$cid order by id desc limit $nums");
    }

    public function addProduct($product)
    {
        return $this->insert($product);
    }

    public function editProduct($product, $id)
    {
        return $this->update($product, array('id'=>$id));
    }

    public function delProduct($id)
    {
        return $this->delete(array('id'=>$id));
    }

}
?>