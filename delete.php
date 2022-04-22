<?php
require_once(__DIR__ . "/application/db.php");


$id = '';
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $todo->delete($id);
    echo "削除したじょ〜〜〜〜！！！";
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