<?php
require_once(__DIR__ . "/class/todo.php");

if(isset($_POST['title']) && isset($_POST["content"])){
    $todo->insert();
    echo "投稿しました";
}elseif(isset($_POST['title_edit']) && isset($_POST['content_edit']) && isset($_POST['id']))
{
    $todo->Edit();
    echo "修正しました";
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