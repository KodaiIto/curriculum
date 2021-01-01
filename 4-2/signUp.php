<?php
require_once('db_connect.php');

if(isset($_POST['signUp'])){
    if(!empty($_POST['name'] && $_POST['pass'])){
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $pdo = db_connect();
        try {
            $sql = "INSERT INTO users(name,password) VALUES(:name,:password)";
            $password_hash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':password',$password_hash);
            $stmt->execute();
            header("Location: login.php");
        } catch(PDOException $e) {
            echo 'Error:'.$e->getMessage();
            die();
        }
    } else{
        echo "名前、もしくはパスワードが未入力です！";
    } 
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>新規ユーザー登録</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="font-family: MS PGothic, sans-serif;">
<main>
    <div class="main_header">ユーザー登録画面</div>
    <article>
        <form method="POST" action="">
            <input type="text" name="name" id="name" placeholder="ユーザー名" class="name"><br>
            <input type="password" name="pass" id="pass" placeholder="パスワード" class="pass"><br>
            <input type="submit" value="新規登録" name ="signUp" id="signUp" class="btn">
        </form>
    </article>
</main>
</body>

    