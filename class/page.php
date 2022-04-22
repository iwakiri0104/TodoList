<?php
require_once __DIR__ . '/../application/config.php';
require_once __DIR__ . '/../application/function.php';
require_once __DIR__ . '/../application/db.php';

class page extends DB{

    public function TotalTodos(){
        return $this->dbh->query("SELECT count(*) FROM todo")->fetchColumn();
    }

    public function TotalPages(){
        return ceil(self::TotalTodos() / 5);
    }

    public function nowpage(){
        if (!isset($_GET['page'])) return (int)1;
        if ($_GET['page'] > self::totalPages()) return self::totalPages();
        if ($_GET['page'] < self::totalPages()) return $_GET['page'];
    }

    public function offset(){
        return (self::nowpage() - 1) * 5;
    }

}
$pages = new page();



?>