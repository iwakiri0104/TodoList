<?php
require_once __DIR__ . '/../application/config.php';
require_once __DIR__ . '/../application/function.php';
require_once __DIR__ . '/../application/db.php';

class page extends DB{

    public function TotalTodos(){
        return parent::selectAll('SELECT count(*) FROM todo');
    }

    public function TotalPages(){
        return ceil(self::TotalTodos() / 5);
    }

    public function nowpage(){
        if (!isset($_GET['page'])) return 1;
        if ($_GET['page'] > self::totalPages()) return self::totalPages();
        if ($_GET['page'] < self::totalPages()) return $_GET['page'];
    }

    public function offset(){
        return (self::nowpage() - 1) * 5;
    }

}
$page = new page();


?>