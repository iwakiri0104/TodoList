<?php

try{
$dbh=new PDO($dsn,$user,$password,[
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    return $dbh;
}catch (PDOException $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしております。 ';
    echo $e->getFile(), '/', $e->getLine(), ':', $e->getMessage();
    exit();
};

?>