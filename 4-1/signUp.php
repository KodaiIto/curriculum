<?php
require_once('db_connect.php');

if(isset($_POST["signUp"])){
    if(!empty($_POST["name"]) && !empty($_POST["password"])){
        $name = $_POST["name"];
        $pass = $_POST["password"];
        $pdo = connect();
        try {
            $sql = "INSERT INTO USERS(name,password) VALUES(:name,:password)";
            $password_hash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password_hash);
            $stmt->execute();
            echo  "登録完了！";
        } catch (PDOException $e) {
            echo "Error:". $e->getMessage();
            die();
        }
    } else {
        echo "名前もしくはパスワードが未入力です！";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>新規登録画面</title>
</head>
<body style="font-family: MS PGothic, sans-serif;">
    <h1>新規登録</h1>
    <form method="POST" action="">
        user:<br>
        <input type="text" name="name" id="name"><br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" name ="signUp" id="signUp">
    </form>
</body>
</html>