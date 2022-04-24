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
<!-- HEAD -->
<?php include 'inc/head.php'; ?> 
<body>
<h1>
 <!-- GETでIDを受け取るor受け取らないで表示内容変更 -->
<?php if (empty($result['ID'])) :?>
    <h2 class="title">新規投稿</h2>
<?php elseif (!empty($result['ID']))  :?>
    <h2 class="title">編集画面</h2>
<?php endif ?>
</h1>
<form action="confirm.php" method="post">
<div class="Form">
    <div class="Form-Item">
        <p class="Form-Item-Label">
        <span class="Form-Item-Label-Required">必須</span>タイトル
        </p>
        <input type="hidden" name="id" value="<?php if (!empty($result['ID'])) echo(escape($result['ID']));?>">
        <input type="text" class="Form-Item-Input" name="title" placeholder="例）休日" value="<?php if (!empty($result['title'])) echo(escape($result['title']));?>">
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label">
        <span class="Form-Item-Label-Required">必須</span>内容</p>
        <input type="text" class="Form-Item-Input" name="content" placeholder="例）アニメ100話消化" value="<?php if (!empty($result['content'])) echo(escape($result['content']));?>">
    </div>
    <?php if (empty($result['ID'])) :?>
        <input type="submit" class="Form-Btn" value="投稿する">
    <?php elseif (!empty($result['ID']))  :?>
        <input type="submit" class="Form-Btn" value="編集する">
    <?php endif ?>
</div>
</form>
<form action="index.php">
        <button type="submit" class="Form-Btn" name="back">戻る</button>
    </form>
</body>
</html>