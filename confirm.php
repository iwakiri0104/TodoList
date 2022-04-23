<?php
require_once(__DIR__ . "/class/todo.php");


//新規投稿、修正後の処理画面

if(isset($_POST['title']) && isset($_POST["content"])){
    $todo->insert();
    echo "投稿しました";
}elseif(isset($_POST['title_edit']) && isset($_POST['content_edit']) && isset($_POST['id']))
{
    $todo->Edit();
    echo "修正しました";
}
?>