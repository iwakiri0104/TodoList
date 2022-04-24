<?php
require_once(__DIR__ . "/db.php");

//todoクラス
class todo {

    private $dbh;
    private $title;
    private $content;

    public function __construct(){
        $this->dbh = new DB();
        $this->title = trim(filter_input(INPUT_POST,'title'));
        $this->content = trim(filter_input(INPUT_POST,'content'));
    }

    //新規投稿
    public function Insert()
    {
        $stmt = $this->dbh->prepare('INSERT INTO todo(title,content) VALUES(:title,:content)');
        $stmt->bindValue(':title',$this->title, PDO::PARAM_STR);
        $stmt->bindValue(':content',$this->content, PDO::PARAM_STR);
        $stmt->execute();
    }

    //編集機能
    public function Edit($id){
        $stmt = $this->dbh->prepare("UPDATE todo SET title=:title,content=:content WHERE id = '".$id."' ");
        $stmt->bindValue(':title',$this->title, PDO::PARAM_STR);
        $stmt->bindValue(':content',$this->content, PDO::PARAM_STR);
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