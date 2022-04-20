<?php
require_once('function.php');

class Page
{
    //検索結果表示
    public function getSearchResult($dbh, $keyword) {
        define("max_per_page", 5);

        $total_todo_sql = "SELECT count(*) FROM todo WHERE title like ?";
        $stmt = $dbh->prepare($total_todo_sql);
        $keywords[] = "%" . $keyword . "%";
        $stmt->execute($keywords);

        $total_results = $stmt->fetchColumn();
        $total_pages = ceil($total_results / max_per_page);

        $page = GetPage();

        // データ取得のスタート地点
        $offset = ($page - 1) * max_per_page ;

        $sql = "SELECT * FROM todo WHERE title like ? limit ". $offset . "," . max_per_page;
        $stmt = $dbh->prepare($sql);
        $data[] = "%" . $keyword . "%";
        $stmt->execute($data);
        $todo_datas = $stmt->fetchAll();
        return [$page, $total_results, $total_pages, $todo_datas];
    }
}

?>