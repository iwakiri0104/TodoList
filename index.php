<?php
require_once('function.php');

?>


<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
</head>
<body>
<h1>
    ToDo一覧
</h1>

    <!-- 検索ボックス -->
<form action="serch.php" method="get">
    <input type="text" name="keyword" style="margin: 10px">
     <button type="submit" >ToDo検索</button>
</form>

    <!-- 新規投稿 -->
<form action="create.php">
    <button type="submit" style="padding: 10px;font-size: 16px;margin-bottom: 10px">新規投稿</button>
</form>
<table border="1">
    <colgroup span="4"></colgroup>
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>作成日時</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    <?php foreach($todo_datas as $data): ?>
    <tr>
        <td><?php echo $data['ID'] ?></td>
        <td><?php echo Escape($data['title']) ?></td>
        <td><?php echo Escape($data['content']) ?></td>
        <td><?php echo $data['created_at'] ?></td>
        <td>
            <a href="edit.php?id=<?php echo $data["ID"]?>">編集</a>
            <!-- <form action="edit.php">
                <button type="submit" style="padding: 10px;font-size: 16px;">編集する</button>
            </form>-->
        </td>
        <td>
            <a href="delete.php?id=<?php echo $data["ID"]?>">削除</a>
            <!-- <form action="delete.php" >
                <button type="submit" style="padding: 10px;font-size: 16px;" >削除する</button>
            </form> -->
        </td>
    </tr>
    <?php endforeach; ?>
</table>

    <!-- ページング -->
    <?php if ($page > 1): ?>
        <a href="?page=<?= Escape($page)-1 ?>">前へ</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <?php if ($page == $i): ?>
            <strong><a href="?page=<?= Escape($i); ?>"><?= Escape($i); ?></a></strong>
        <?php else: ?>
            <a href="?page=<?= Escape($i); ?>"><?= Escape($i); ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $total_pages): ?>
        <a href="?page=<?= Escape($page)+1 ?>">次へ</a>
    <?php endif; ?>

</body>
</html>