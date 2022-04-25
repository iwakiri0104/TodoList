<?php
require_once(__DIR__ . "/todo.php");

class DataValidation{

    private $errorMsg = "";
    private $title;
    private $content;

    public function __construct()
    {
        $this->title = trim(filter_input(INPUT_POST,'title'));
        $this->content = trim(filter_input(INPUT_POST,'content'));
    }

    function validForArticleParams($title, $content) {

        //空文字のチェック
        if ($title == "" || $content == "") {
            $this->errorMsg = "入力されていない項目があります。";
            return false;
        }
        //入力値のサイズのチェク
        if (mb_strlen($title) > 7){
            $this->errorMsg = "入力値のサイズが制限を超えている項目があります。";
            return false;
        }
        return true;
    }
        //エラーメッセージの取得用メソッド
    function getErrorMsg() {
        return $this->errorMsg;
    }
}

$dv = new DataValidation();

//エスケープ
function Escape($str){
    return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}
?>