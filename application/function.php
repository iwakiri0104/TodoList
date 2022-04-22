<?php
require_once(__DIR__ . "/db.php");

//エスケープ
function Escape($str){
    return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

//IDからデータ取得する
function serch_fromID($dbh,$id){
    $stmt=$dbh->prepare('SELECT * FROM todo WHERE id = :id');
    $stmt->execute(array(':id' => $_GET["id"]));
    $result = 0;
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
    $dbh=null;
}
?>
