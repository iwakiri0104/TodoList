<?php

require_once('function.php');
$dbh = dbconnect();

$result = serch_fromID($dbh,$id);

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
    編集ページ
</h1>
<form action="index.php" method="post">
                <input type="hidden" name="id" value="<?php if (!empty($result['ID'])) echo(escape($result['ID']));?>">
            <p>
                <label>タイトル：</label>
                <input type="text" name="title_edit" value="<?php if (!empty($result['title'])) echo(escape($result['title']));?>">
            </p>
            <p>
                <label>内容：</label>
                <input type="text" name="content_edit" value="<?php if (!empty($result['content'])) echo(escape($result['content']));?>">
            </p>
            <input type="submit" value="編集する">


</form>

<form action="index.php">
    <button type="submit" name="back">戻る</button>
</form>
</body>
</html>