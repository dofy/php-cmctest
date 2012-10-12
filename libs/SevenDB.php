<?php

class SevenDB
{
	private $db_host;
	private $db_user;
	private $db_pass;
	private $db_name;
	
	private $db_coding;
	
	private $conn;
	
	private $last_sql = '';
	protected $result;
	
	public $debug = false;
	
	public function __construct($host, $user, $pass, $dbName, $coding = 'UTF8')
	{
		$this->db_host = $host;
		$this->db_user = $user;
		$this->db_pass = $pass;
		$this->db_name = $dbName;
		
		$this->db_coding = $coding;
		
		$this->connect();
	}
	
	private function connect()
	{
		$this->conn = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
		mysql_selectdb($this->db_name, $this->conn);
		
		$this->query("SET NAMES $this->db_coding;");
	}
	
	public function lastSQL()
	{
		return $this->last_sql;
	}
	
	private function query($sql)
	{
		if($this->debug)
			printf('<div style="font-family:courier new;background-color:#f2f2f2;">%s</div>', $sql);
			
		$this->lastSQL = $sql;
		$result = mysql_query($sql);
		
		if($result)
		{
			$this->result = $result;
		}
		else
		{
			printf('<div style="font-family:courier new;background-color:#fc0;">%s</div>', mysql_error());
		}
	}
	
	public function select($table, $columnName = "*", $condition = NULL, $limit = NULL)
	{
		$condition = $condition
			? 'WHERE ' . $condition
			: NULL;
		
        $limit = $limit
            ? 'LIMIT ' . $limit
            : NULL;
        
		$sql = "SELECT $columnName FROM $table $condition $limit";
		$this->query($sql);
		
		return mysql_numrows($this->result);
	}
	
	public function insert($table, $columnName, $value)
	{
		$this->query("INSERT INTO $table ($columnName) VALUES ($value)");
		return mysql_insert_id();
	}
	
	public function update($table, $mod_content, $condition)
	{
		$this->query("UPDATE $table SET $mod_content WHERE $condition");
		return mysql_affected_rows();
	}
	
	public function delete($table, $condition)
	{
		$this->query("DELETE FROM $table WHERE $condition");
		return mysql_affected_rows();
	}
    
    /**
     *  获取指定表的记录数
     *  @param  int     $table  数据表
     *  @param  string  $key    主键
     *  @param  string  $others 其他 SQL 部分
     **/
    public function getCount($table, $key = 'id', $others = null)
    {
        $sql = "SELECT COUNT($key) FROM $table $others";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row[0];
    }
	
	public function fetch_assoc()
	{
		return @mysql_fetch_assoc($this->result);
	}

    /**
     * 析构, 关闭 mysql 连接
     **/
    public function __destruct()
    {
        @mysql_close();
    }
}


?>