<?php
require_once('Item.php');
require_once('DB_Functions.php');

$db = new DB_Functions();
$arr = $db->getItems(0);

foreach ($arr as &$obj) {
    $item = $obj;
    echo $item->getName()."<br>";
}


/*
$item = new Item();
$item->setName("Testing");
$name = $item->getName();

echo $name;
echo 'Hello World';
*/

?>