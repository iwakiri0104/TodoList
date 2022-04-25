<?php
//削除画面
require_once(__DIR__ . "/class/todo.php");
require_once(__DIR__ . "/class/db.php");
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Document</title>
</head>
<body>
<table class="table01">
    <thead>
    <tr>
        <?php if(!empty($_GET['id'])) :?>
        <th>ID</th>
        <th>タイトル</th>
        <th>内容</th>
    </tr>
    </thead>
    <tbody>
        <td><?php echo $db->DataFromID($id)['ID']?></td>
        <td><?php echo $db->DataFromID($id)['title']?></td>
        <td><?php echo $db->DataFromID($id)['content']?></td>
    </tr>
    </tbody>
    </table>
        <?php $todo->delete($id)?>
        <h2>を削除したじょ〜〜！！</h2>
<?php else :?>
    <?php throw new Exception('空のIDです')?>
<?php endif ?>
<form action="index.php">
    <button type="submit" name="back" class="Todo-Post-Btn">戻る</button>
</form>
</body>
</html>