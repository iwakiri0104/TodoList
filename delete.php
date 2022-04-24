<?php
require_once(__DIR__ . "/class/todo.php");
require_once(__DIR__ . "/class/db.php");

$id = $_GET['id'];

if(!empty($_GET['id'])){
    echo "タイトル 「  " . $db->DataFromID($id)['title'] ."  」". " 内容 「  ". $db->DataFromID($id)['content'] ."  」"."を削除したじょ〜〜〜〜！！！";
    $todo->delete($id);
}else{
    throw new Exception('空のIDです');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php">
    <button type="submit" name="back">戻る</button>
</form>
</body>
</html>