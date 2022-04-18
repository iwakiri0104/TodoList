
<?php

//データベースに接続　
function dbconnect(){

    $dsn='mysql:dbname=TodoList;host=localhost;charset=utf8';
    $user='root';
    $password='root';

    try{
        $dbh=new PDO($dsn,$user,$password,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }catch (PDOException $e)
    {
        print'ただいま障害により大変ご迷惑をお掛けしております。 ';
        echo $e->getFile(), '/', $e->getLine(), ':', $e->getMessage();
	    exit();
    };

    return $dbh;
}


//一覧表示
function getAlltodo(){
    
    $dbh = dbconnect();
    $sql='SELECT * FROM todo'; 
    $stmt=$dbh->query($sql);
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    
    return $result;
    $dbh = null;
}

//新規投稿

function insertToDo($dbh,$title,$content){ 

    $sql='INSERT INTO todo(title,content,created_at,updated_at)VALUES (?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $title;
    $data[] = $content;
    $data[] = date('Y-m-d H:i:s', strtotime('+9hour'));
    $data[] = date('Y-m-d H:i:s', strtotime('+9hour'));

    $result = $stmt->execute($data);

    return $result;
    $dbh=null;

}


//削除
function deleteToDo($dbh,$id){

    $sql="DELETE FROM todo WHERE id = '".$id."' ";
    $result = $dbh->query($sql);
    if(!$result){
        throw new Exception('削除できません');
    }
}

//編集
function editToDo($dbh,$id,$title_edit,$content_edit){

    $sql='UPDATE todo SET title=?,content=?,updated_at=? WHERE id=?';
    $stmt=$dbh->prepare($sql);
    $data[]= $title_edit;
    $data[]= $content_edit;
    $data[] = date('Y-m-d H:i:s', strtotime('+9hour'));
    $data[]= $id;

    $result = $stmt->execute($data);

    return $result;
    $dbh=null;
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



//エスケープ
function Escape($str){
    return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

//バリデーション


//ページング
function getTodos($dbh) {
    define("max_per_page", 5);

    $totalTodos = $dbh->query("SELECT count(*) FROM todo")->fetchColumn();
    $totalPages = ceil($totalTodos / max_per_page);

    // ページ数取得。GETで渡ってこない場合は1を格納
    if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
        // urlのページ数が実際のページ数より多い場合、最後のページを格納
        if ($_GET['page'] > $totalPages) {
            $page = $totalPages;
        } else {
            $page = (int)$_GET["page"];
        }
    } else {
        $page = 1;
    }

    // データ取得のスタート地点
    $offset = ($page - 1) * max_per_page;

    $sql = "SELECT ID,title,content,created_at,updated_at FROM todo WHERE 1 limit " . $offset . "," . max_per_page;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $todo_datas = $stmt->fetchAll();
    return [$page, $totalPages, $todo_datas];
}

// 検索結果を表示する
function getSearchResult($dbh, $keyword) {
    define("max_per_page", 5);

    $total_todo_sql = "SELECT count(*) FROM todo WHERE title like ?";
    $stmt = $dbh->prepare($total_todo_sql);
    $keywords[] = "%" . $keyword . "%";
    $stmt->execute($keywords);

    $total_results = $stmt->fetchColumn();
    $total_pages = ceil($total_results / max_per_page);

    // ページ数取得。GETで渡ってこない場合は1を格納
    if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
        // urlに表記されているページ数が実際のページ数より多い場合、最後のページを格納
        if ($_GET["page"] > $total_pages) {
            $page = $total_pages;
        } else {
            $page = (int)$_GET["page"];
        }
    } else {
        $page = 1;
    }

     // データ取得のスタート地点
    $offset = ($page - 1) * max_per_page ;

    $sql = "SELECT * FROM todo WHERE title like ? limit ". $offset . "," . max_per_page;
    $stmt = $dbh->prepare($sql);
    $data[] = "%" . $keyword . "%";
    $stmt->execute($data);
    $todo_datas = $stmt->fetchAll();
    return [$page, $total_results, $total_pages, $todo_datas];
}

?>