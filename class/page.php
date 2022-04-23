<?php
require_once(__DIR__ . "/db.php");

//ページクラス
class page extends DB{

    //１ページにおける最大表示件数を定義
    const MaxPerPage = 5;

    public function MaxPerPage(){
        return self::MaxPerPage;
    }

    //データ数を取得
    public function TotalTodos(){
        if(!isset($_GET['keyword'])) return $this->dbh->query("SELECT count(*) FROM todo")->fetchColumn();
        if(isset($_GET['keyword'])) return $this->dbh->query("SELECT count(*) FROM todo WHERE title like " . "'%". $_GET['keyword']."%'")->fetchColumn();
    }

    //合計ページ数を取得
    public function TotalPages(){
        return ceil(self::TotalTodos() / self::MaxPerPage);
    }

    //現在のページ番号を取得
    public function nowpage(){
        if (!isset($_GET['page'])) return (int)1;
        if ($_GET['page'] > self::totalPages()) return self::totalPages();
        if ($_GET['page'] <= self::totalPages()) return $_GET['page'];
    }

    //データの取得開始位置
    public function offset(){
        return (self::nowpage() - 1) * self::MaxPerPage;
    }

}

//pageクラスのインスタンス化
$pages = new page();



?>