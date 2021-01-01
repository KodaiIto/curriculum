<?php
session_start();
$_SESSIN = array();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="font-family: MS PGothic, sans-serif;">
    ログアウト画面
    <div class="logout">ログアウトしました。</div>
    <button type="button" onclick="location.href='login.php'">ログイン画面に戻る</button>
<body>
</html>