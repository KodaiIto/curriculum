<?php
require_once("db_connect.php");

/*$_SESSION["user_name"]が空だった場合、ログインページに
リダイレクトする */
function check_user_logged_in() {
    //セッション開始
    session_start();
    //セッションにuser_nameの値がなければlogin.phpにリダイレクト
    if (empty($_SESSION["user_name"])) {
        header("Location: login.php");
        exit;
    }
    //
}

//引数の値が空だった場合、main.phpにリダイレクトする
function redirect_main_unless_parameter($param) {
    if(empty($param)) {
        header("Location: main.php");
        exit;
    }
}

//引数で与えられたidでpostsテーブルを検索する
//もし対象のレコードがなければmain.phpに遷移させる
function find_post_by_id($id) {

    $pdo = connect();
    try{
        $sql = "SELECT * FROM posts WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    } catch(PDOException $e) {
        echo 'Error:' . $e->getMessage();
        die();
    }

    //結果が１行取得できたら
    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    //     $id = $row['id'];
    //     $title = $row['title'];
    //     $content = $row['content'];
        return $row;

    } else {
        //echo "対象のデータがありません。";
        redirect_main_unless_parameter($row);
    }
}
    
?>