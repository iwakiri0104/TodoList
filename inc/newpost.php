<!--GETで検索ワードを受け取ってない場合に表示-->

<?php if(!isset($_GET['keyword'])) :?>
<form action="postform.php">
    <button type="submit" class="Post-Btn">新規投稿はこちらから</button>
</form>
<?php endif;?>