<?php
require_once('db_connect.php');
session_start();

if(!empty($_POST)) {
    if(empty($_POST['name'])){
        echo "名前が未入力です。";
    }
    if(empty($_POST['pass'])){
        echo "パスワードが未入力です。";
    }

    if(!empty($_POST["name"]) && !empty($_POST["pass"])) {
        //ログイン名とパスワードのエスケープ処理
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
        //ログイン処理開始
        $pdo = connect();
        try {
            //データベースアクセスの処理文章。ログイン名があるか判定。
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();//もし名前がなくても処理は続く
        } catch(PDOException $e) {
            echo 'Error:'. $e->getMessage();
            die();
        }

        //結果が１行取得できたら、、、
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //ハッシュ化されたパスワードを判定する定型関数password_verify
            //入力された値と引っ張ってきた値が同じか判定する。
            if(password_verify($pass, $row['password'])) {
                //セッションに値を保存
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['name'];
                //main.phpにリダイレクト
                header("Location: main.php");
                exit;
            } else {
                //パスワードが間違ってたときの処理
                echo "パスワードに誤りがあります。";
            }
        } else {
            //ログイン名がなかったときの処理
            echo "ユーザー名に誤りがあります。パスワードも誤っている可能性があります。";
        }
    }
}
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ログインページ</title>
</head>
<body style="font-family: MS PGothic, sans-serif;">
    <h2>ログイン画面</h2>
    <form method="post" action="">
        名前：<input type="text" name="name" size="15" /><br><br>
        パスワード：<input type="password" name="pass" size="15" /><br><br>
        <input type="submit" value="ログイン" />
    </form>
</body>
</html>