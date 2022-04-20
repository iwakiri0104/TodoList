<?php
require_once('');
$dbh = dbconnect();

$id = '';
if(!empty($_GET['id'])){
    $id = $_GET['id'];
}else{
    throw new Exception('空のIDです');
}

deleteToDo($dbh,$id);

header("Location: http://localhost/fullspeed/index.php");
die;

?>