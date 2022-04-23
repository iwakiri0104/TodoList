<?php
require_once(__DIR__ . "/db.php");

//todoクラス
class todo {

    private $dbh;

    public function __construct(){
        $this->dbh = new DB();
    }

    //新規投稿
    public function Insert()
    {
        $title = trim(filter_input(INPUT_POST,'title'));
        $content = trim(filter_input(INPUT_POST,'content'));

        $stmt = $this->dbh->prepare('INSERT INTO todo(title,content) VALUES(:title,:content)');
        $stmt->bindValue(':title',$title, PDO::PARAM_STR);
        $stmt->bindValue(':content',$content, PDO::PARAM_STR);
        $stmt->execute();
    }

    //編集機能
    public function Edit(){
        $id = trim(filter_input(INPUT_POST,'id'));
        $title = trim(filter_input(INPUT_POST,'title_edit'));
        $content = trim(filter_input(INPUT_POST,'content_edit'));

        $stmt = $this->dbh->prepare("UPDATE todo SET title=:title_edit,content=:content_edit WHERE id=:id");
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);
        $stmt->bindValue(':title_edit',$title, PDO::PARAM_STR);
        $stmt->bindValue(':content_edit',$content, PDO::PARAM_STR);
        $stmt->execute();
    }
    
    //削除機能
    public function delete($id){
    $sql="DELETE FROM todo WHERE id = '".$id."' ";
    $this->dbh->query($sql);
    }
}

//todoクラスのインスタンス化
$todo = new todo();


?>