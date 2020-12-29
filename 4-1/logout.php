<?php
//セッション開始
session_start();
//セッション変数のクリア、空の配列にしてしまう。
$_SESSION = array();
//セッションクリア、session_destroyメソッドを使う。
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
</head>
<body>
    <h1>ログアウト画面</h1>
    <div>ログアウトしました</div>
    <a href="login.php">ログイン画面に戻る</a>
</body>
</html>