<?php
//新規投稿、修正後の処理画面
require_once(__DIR__ . "/class/todo.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>確認画面</title>
</head>
<!--idを受け取れば編集、受け取らなければ新規投稿-->
<?php if(empty($_POST['id'])) :?>
    <?php $todo->insert()?>
    <h2>投稿しました！</h2>
<?php elseif(!empty($_POST['id'])) :?>
    <?php $todo->Edit($_POST['id'])?>
    <h2>編集しました！</h2>
<?php endif ;?>
<body>
<form action="index.php">
<button type="submit" name="back" class="Todo-Post-Btn">ToDo一覧に戻る</button>
</form>
</body>
</html>