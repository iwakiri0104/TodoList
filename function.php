<?php

function GetPage()
{
    if (isset($_GET["page"]) && is_numeric($_GET["page"])) {

        if ($_GET["page"] > $total_pages) {
            $page = $total_pages;
        } else {
            $page = (int)$_GET["page"];
        }
    } else {
        $page = 1;
    }
    return $page;
}

//エスケープ
function Escape($str){
    return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

function serch_fromID($dbh,$id){
    $stmt=$dbh->prepare('SELECT * FROM todo WHERE id = :id');
    $stmt->execute(array(':id' => $_GET["id"]));
    $result = 0;
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
    $dbh=null;
?>