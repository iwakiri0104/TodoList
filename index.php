<?php
require_once(__DIR__ . "/class/validate.php");
require_once(__DIR__ . "/class/page.php");

$keyword = '';
if(!empty($_GET['keyword'])){
    $keyword = $_GET['keyword'];
}

?>
<!doctype html>
<html lang="ja">

<!-- HEAD -->
<?php include 'inc/head.php'; ?> 

<body>
<h1 class="title">
<?php if (empty($keyword)) :?>
        Todo一覧
<?php elseif (!empty($keyword))  :?>
        検索結果
<?php endif ?> 
</h1>
<!-- 検索ボックス -->
<form action=" " method="get">
    <input type="text" name="keyword" style="margin: 10px">
     <button type="submit" >ToDo検索</button>
</form>
<!-- 新規投稿 -->
<form action="PostForm.php">
    <button type="submit" style="padding: 10px;font-size: 16px;margin-bottom: 10px">新規投稿</button>
</form>
<!-- テーブル -->
  <table class="table01">
    <thead>
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>作成日時</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($items as $data): ?>
    <tr>
        <td><?php echo $data['ID'] ?></td>
        <td><?php echo Escape($data['title']) ?></td>
        <td><?php echo Escape($data['content']) ?></td>
        <td><?php echo $data['created_at'] ?></td>
        <td>
            <a href="PostForm.php?id=<?php echo $data["ID"]?>">編集</a>
        </td>
        <td>
            <a href="delete.php?id=<?php echo $data["ID"]?>">削除</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<!-- ページング -->
<?php include 'inc/paging.php'; ?> 
</body>
</html>
</body>
</html>