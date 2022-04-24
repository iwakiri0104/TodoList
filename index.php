<?php
require_once(__DIR__ . "/class/validate.php");
require_once(__DIR__ . "/class/page.php");

$keyword = '';
if(!empty($_GET['keyword'])){
    $keyword = $_GET['keyword'];
}
?>
<!doctype html>
<!-- HEAD -->
<?php include 'inc/head.php'; ?> 
<!--body-->
<body>
<h1 class="title">
    <?php if (empty($keyword)) :?>
        Todo一覧
    <?php elseif (!empty($keyword))  :?>
        検索結果
    <?php endif ?> 
</h1>
<!-- 検索ボックス -->
<?php include 'inc/seachbox.php'; ?> 
<!-- 新規投稿 -->
<?php include 'inc/newpost.php'; ?> 
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
        </thead>
    <tbody>
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