<?php

include('../inc/config.php');
include('../inc/utils.php');

include('../inc/MyDB.php');

$db = new MyDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db->debug = true;

echo $db->insert('news', 'title,content', "'现要','克世世代代要'");

echo $db->select("news ");


while($row = $db->fetch_assoc())
{
    var_dump($row);
}

?>


<form>
    <input type="text" name="test"/>
    <input type="submit" />
</form>