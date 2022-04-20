<?php
require_once('DB.php');
require_once('function.php');

class todo{
    //投稿
    public function insertToDo($dbh,$title,$content){ 

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
    
    //削除
    function deleteToDo($dbh,$id){

        $sql="DELETE FROM todo WHERE id = '".$id."' ";
        $result = $dbh->query($sql);
        if(!$result){
            throw new Exception('削除できません');
        }
    }


}

?>