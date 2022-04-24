<?php
//新規投稿、修正後の処理画面

require_once(__DIR__ . "/class/todo.php");

//if(バリデーションメソッド)がtrueなら投稿、削除の仕様に変更予定
//バリデーションメソッド：指定外の値を受け取ったらメッセージ表示

//idを受け取れば編集、受け取らなければ新規投稿
if(isset($_POST['title']) && isset($_POST["content"])){
    $todo->insert();
    echo "投稿しました";
}elseif(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['id']))
{
    $todo->Edit($_POST['id']);
    echo "修正しました";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
</head>
<body>
<form action="index.php">
<button type="submit" name="back">ToDo一覧に戻る</button>
</form>
</body>
</html>