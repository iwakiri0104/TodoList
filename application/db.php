<?php

class DB
{
  /* プロパティ(定数)の宣言 */
  const DSN ='mysql:dbname=TodoList;host=localhost;charset=utf8';
  const USERNAME  ='root';
  const PASSWORD  ='root';

  public $dbh; 

  function __construct(){
      $this->dbh = $this->dbh();
  }

  /* データベースに接続する メソッド(関数) */
    public function dbh(){
        try{
            $dbh=new PDO
            (self::DSN,self::USERNAME,self::PASSWORD,
            [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            //ASSOCにすれば連想配列にしなくてすむ
            PDO::ATTR_EMULATE_PREPARES => false,
            ]);
            return $dbh;
            }catch (PDOException $e)
            {
                print'ただいま障害により大変ご迷惑をお掛けしております。 ';
                echo $e->getFile(), '/', $e->getLine(), ':', $e->getMessage();
                exit();
            };
    }

    //prepareメソッド
    public function prepare($sql){
        return $this->dbh->prepare($sql);
    }


    //queryメソッド
    public function query($sql){
        return $this->dbh->query($sql);
    }

    //データを全部取得するメソッド
    public function selectAll($sql)
    {
        $stmt=$this->dbh()->query($sql);
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

}
//インスタンス化
$db = new db();
$dbh = $db->dbh();

?>