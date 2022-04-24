<?php
//フォーム画面：GETでIDを受け取れば編集、受け取らなければ新規投稿

require_once(__DIR__ . "/class/db.php");
require_once(__DIR__ . "/class/validate.php");

$id = '';
if(!empty($_GET['id'])){
    $result = $db->DataFromID($id);
}
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Page</title>
</head>
<body>
<h1>
<?php if (empty($result['ID'])) :?>
    <h2>新規投稿</h2>
<?php elseif (!empty($result['ID']))  :?>
    <h2>編集画面</h2>
<?php endif ?>
</h1>
<form action="confirm.php" method="post">
                <input type="hidden" name="id" value="<?php if (!empty($result['ID'])) echo(escape($result['ID']));?>">
            <p>
                <label>タイトル：</label>
                <input type="text" name="title" placeholder= "例:休日" value="<?php if (!empty($result['title'])) echo(escape($result['title']));?>">
            </p>
            <p>
                <label>内容：</label>
                <input type="text" name="content" placeholder= "例:アニメ5作消化" value="<?php if (!empty($result['content'])) echo(escape($result['content']));?>">
            </p>
            <?php if (empty($result['ID'])) :?>
                <input type="submit" value="投稿する">
            <?php elseif (!empty($result['ID']))  :?>
                <input type="submit" value="編集する">
            <?php endif ?>
</form>
<form action="index.php">
    <button type="submit" name="back">戻る</button>
</form>
</body>
</html>