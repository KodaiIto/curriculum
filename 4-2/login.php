<?php
require_once('db_connect.php');
session_start();

if(!empty($_POST)) {
    if(empty($_POST['name'])) {
        echo '名前が未入力です！';
    } 
    if(empty($_POST['pass'])){
        echo 'パスワードが未入力です！';
    } 
    if(!empty($_POST['name'] && $_POST['pass'])) {
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
        $pdo = db_connect();
        try{
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name',$name);
            $stmt->execute();
        } catch(PDOException $e) {
            echo 'Error:'.$e->getMessage();
            die();
        }
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if(password_verify($pass,$row['password'])){
                $_SESSION['user_id']=$row['id'];
                $_SESSION['user_name']=$row['name'];
                header("Location: main.php");
                exit;
            } else{
                echo 'パスワードに誤りがあります。';
            }
        } else{
            echo 'ユーザー名に誤りがあります。パスワードも誤っている可能性があります。';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="font-family: MS PGothic, sans-serif;">
<main>
    <div class="main_header clearfix">
        <div class="title">ログイン画面</div>
        <div class="link"><button type="button" onclick="location.href='signUp.php'" class="link_button">新規ユーザー登録</button></div>
    </div>
    <form method="POST" action="">
        <input type="text" name="name" id="name" placeholder="ユーザー名" class="name" /><br>
        <input type="password" name="pass" id="pass" placeholder="パスワード" class="pass" /><br>
        <input type="submit" name="login" value="ログイン" class="btn">
    </form>
    
</main>
</body>
</html>