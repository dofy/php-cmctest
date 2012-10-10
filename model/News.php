<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 
 * Update:  
 */

include('../inc/MyDB.php');

class News extends MyDB
{
    
    private $table = 'news';
    
    public function __construct()
    {
        parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
    
    public function getOne($id)
    {
        $this->select($this->table, '*', "id=$id");
        
        return $this->fetch_assoc();
    }
    
    public function getList($limit = NULL)
    {
        $this->select($this->table, '*', null, $limit);
        
        while($result[] = $this->fetch_assoc());
        
        return $result;
    }
    
    public function create($title, $content)
    {
        return $this->insert($this->table, 'title, content', "'$title', '$content'");
    }
    
    public function modify($id, $title, $content)
    {
        return $this->update($this->table, "title='$title', content='$content'", "id=$id");
    }
    
    public function remove($id)
    {
        return $this->delete($this->table, "id=$id");
    }
    
}

?>