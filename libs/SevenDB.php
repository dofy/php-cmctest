<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 1.0
 * Update:  11/20/08
 */
class SevenDB
{
    public $recordcount = 0;
    public $pagesize    = 20;
    public $page        = 1;
    public $pagecount   = 1;

    public  $debug = false;
    private $last_sql;

    public function __construct($host, $user, $pass, $db = 'test', $charset = 'utf8')
    {
        mysql_connect($host, $user, $pass);
        mysql_select_db($db);
        mysql_query("set names '$charset';");
    }

    /**
     * 执行 SQL 语句
     * @param String $sql 要执行的 SQl 语句
     **/
    public function query($sql)
    {
        if($this->debug)
            echo '<pre>-- ' . $sql . '</pre>';
        $this->last_sql = $sql;
        return mysql_query($sql);
    }
    
    /**
     * 执行 insert 语句
     * @param   String  $table      表明
     * @param   String  $object     对象键值对数组
     * @return  int     insert_id   被插入记录的 id
     **/
    public function insert($table, $object)
    {
        if((!is_array($object)) || count($object) == 0) return false;
        $keys = array();
        $vals = array();
        foreach($object as $key=>$val)
        {
            array_push($keys, $key);
            array_push($vals, $this->sqlstr($val));
        }
        $skey = join('`,`', $keys);
        $sval = join("','", $vals);
        $sql = "insert into `$table` (`$skey`) values ('$sval')";
        $this->query($sql);
        return mysql_insert_id();
    }

    public function update($table, $object, $which)
    {
        if((!is_array($object)) || count($object) == 0 || (!is_array($which)) || count($which) == 0 ) return false;
        $objs = array();
        $whis = array();
        foreach($object as $key=>$val)
        {
            array_push($objs, "`$key` = '".$this->sqlstr($val)."'");
        }
        foreach($which as $key=>$val)
        {
            array_push($whis, "`$key` = '".$this->sqlstr($val)."'");
        }
        $sobj = join(',', $objs);
        $swhi = join(" and ", $whis);
        $sql = "update `$table` set $sobj where $swhi";
        $this->query($sql);
        return mysql_affected_rows();
    }

    public function delete($table, $which)
    {
        if(!is_array($which) || count($which) == 0 ) return false;
        $whis = array();
        foreach($which as $key=>$val)
        {
            $whis[] = "`$key` = '" . $this->sqlstr($val) . "'";
        }
        $swhi = join(" and ", $whis);
        $sql = "delete from `$table` where $swhi";
        $this->query($sql);
        return mysql_affected_rows();
    }

    /**
     * 取得所有记录
     * @param   String  $sql            要执行的 SQL 语句
     * @return  Array   $arr_return     返回结果数组
     **/
    public function getAll($sql)
    {
        $arr_return = array();
        $result = $this->query($sql);
        while($row = mysql_fetch_assoc($result))
        {
            array_push($arr_return, $row);
        }
        return $arr_return;
    }
    
    /**
     *  获取指定表的记录数
     *  @param  int     $table  数据表
     *  @param  string  $key    主键
     *  @param  string  $others 其他 SQL 部分
     **/
    public function getCount($table, $key = 'id', $others = '')
    {
        $sql = "select count(`$key`) from `$table` $others";
        $result = $this->query($sql);
        $row = mysql_fetch_row($result);
        $this->recordcount = $row[0];
        return $row[0];
    }

    /**
     * 获取指定记录(用于翻页)
     * @param  string  $sql        要执行的 SQL 语句
     * @param  int     $page       当前页
     * @param  int     $pagesize   每页条数
     * @resutn 记录数组
     **/
    public function getRows($sql, $page = 1, $pagesize = 20)
    {
        $this->pagesize = intval($pagesize) > 0 ? $pagesize : 20;
        $this->pagecount = ceil($this->recordcount / $this->pagesize);
        $this->page = max(1, min(max(1, intval($page)), $this->pagecount));

        $limit_begin = $this->pagesize * ($this->page - 1);
        $limit_count = $this->pagesize;
        
        $arr_return = array();
        $result = $this->query($sql . " limit $limit_begin, $limit_count");
        while($row = mysql_fetch_assoc($result))
        {
            array_push($arr_return, $row);
        }
        return $arr_return;
    }

    /**
     * 取得一条记录
     * @param  String $sql 要执行的 SQl 语句
     * @return 数据记录
     **/
    public function getOne($sql)
    {
        $result = $this->query($sql . ' limit 1');
        return mysql_fetch_assoc($result);
    }
    
    /**
     * 返回页数信息
     * @return array pageInfo
     **/
    public function pageInfo()
    {
        return array('page'=>$this->page,
                     'pagesize'=>$this->pagesize,
                     'pagecount'=>$this->pagecount,
                     'recordcount'=>$this->recordcount);
    }

    /**
     * 过滤 SQL 敏感字符
     * @param string $str 过滤字符
     **/
    public function sqlstr($str)
    {
        return addslashes($str);
    }

    /**
     * 获取最后执行的 SQL 语句
     * @return string $last_sql 最后执行的 SQL 语句
     **/
    public function lastSQL()
    {
        return $this->last_sql;
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