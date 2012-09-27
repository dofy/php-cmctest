<?php

class MyDB
{
	public function MyDB()
	{
		mysql_connect(DB_HOST, DB_USER, DB_PASS);
		mysql_selectdb(DB_NAME);
		echo 999, DB_NAME, mysql_error();
	}
	
	public function query($sql)
	{
		$query = mysql_query($sql);
		return mysql_fetch_assoc($query);
	}
}


?>