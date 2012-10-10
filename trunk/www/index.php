<?php

header('content-charset:utf8');

include('../inc/include_all.php');

include('../model/News.php');

$news = new News();

$t = "asdf'as\df";
$c = 'asdf';
//$id = $news->create(addslashes($t), addslashes($c));

echo '<pre>';
var_dump($news->getList('3'));
echo '</pre>';

?>

<form>
    <input type="text" name="test" />
    <input type="submit" />
</form>