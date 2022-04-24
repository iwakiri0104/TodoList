<!-- 通常ページング -->
   <?php if(!isset($_GET['keyword'])) :?>
        <?php if ($pages->nowpage() > 1): ?>
            <a href="?page=<?= Escape($pages->PreviousPage()) ?>">前へ</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $pages->TotalPages(); $i++): ?>
            <?php if ($pages->nowpage() == $i): ?>
                <strong><a href="?page=<?= Escape($i); ?>"><?= Escape($i); ?></a></strong>
            <?php else: ?>
                <a href="?page=<?= Escape($i); ?>"><?= Escape($i); ?></a>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if ($pages->nowpage() < $pages->TotalPages()): ?>
            <a href="?page=<?= Escape($pages->NexPage()) ?>">次へ</a>
        <?php endif; ?>
    <?php endif;?>

    
 <!-- 検索結果ページング -->
    <?php
    $keyword = '';
    if(!empty($_GET['keyword'])){
        $keyword = $_GET['keyword'];
    }
    ?>

    <?php if(isset($_GET['keyword'])) :?>
        <?php if ($pages->nowpage() > 1): ?>
            <a href="?page=<?= Escape($pages->PreviousPage()) ?>&keyword=<?= Escape($keyword); ?>">前へ</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $pages->TotalPages(); $i++): ?>
            <?php if ($pages->nowpage() == $i): ?>
                <strong><a href="?page=<?= Escape($i); ?>&keyword=<?= Escape($keyword); ?>"><?= Escape($i); ?></a></strong>
            <?php else: ?>
                <a href="?page=<?= Escape($i); ?>&keyword=<?= Escape($keyword); ?>"><?= Escape($i); ?></a>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if ($pages->nowpage() < $pages->TotalPages()): ?>
            <a href="?page=<?= Escape($pages->NexPage()) ?>&keyword=<?= Escape($keyword); ?>">次へ</a>
        <?php endif; ?>
        <form action="index.php">
        <button type="submit" name="back" class="Todo-Post-Btn">ToDo一覧に戻る</button>
    <?php endif;?>

