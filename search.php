<?php
$keyword = $_GET['keyword'];
$items = $pages->selectAll("SELECT * FROM todo WHERE title like ".$db->Keyword($keyword). "limit " . $pages->offset() . "," . $pages->MaxPerPage() );

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
    検索結果
</h1>

    <!-- 検索ボックス -->
<form action="test.php" method="get">
    <input type="text" name="keyword" style="margin: 10px">
     <button type="submit" >ToDo検索</button>
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
    <?php foreach($items as $data): ?>
    <tr>
        <td><?php echo $data['ID'] ?></td>
        <td><?php echo Escape($data['title']) ?></td>
        <td><?php echo Escape($data['content']) ?></td>
        <td><?php echo $data['created_at'] ?></td>
        <td>
            <a href="edit.php?id=<?php echo $data["ID"]?>">編集</a>
        <td>
            <a href="delete.php?id=<?php echo $data["ID"]?>">削除</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


    <!-- ページング -->
    <?php if ($pages->nowpage() > 1): ?>
        <a href="?page=<?= Escape($pages->nowpage())-1 ?>">前へ</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $pages->TotalPages(); $i++): ?>
        <?php if ($pages->nowpage() == $i): ?>
            <strong><a href="?page=<?= Escape($i); ?>"><?= Escape($i); ?></a></strong>
        <?php else: ?>
            <a href="?page=<?= Escape($i); ?>"><?= Escape($i); ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($pages->nowpage() < $pages->TotalPages()): ?>
        <a href="?page=<?= Escape($pages->nowpage())+1 ?>">次へ</a>
    <?php endif; ?>


 <form action="index.php">
    <button type="submit" name="back">ToDo一覧に戻る</button>
</form>
</body>
</html>