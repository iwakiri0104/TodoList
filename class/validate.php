<?php
//バリデーションのクラス制作する

//エスケープ
function Escape($str){
    return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}
?>