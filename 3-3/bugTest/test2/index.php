<?php
require 'password.php';
//URL https://zeropuro.com/blog/?p=322
// セッション開始
session_start();
include_once("dbconnect.php");
//https://zeropuro.com/blog/?p=328

// エラーメッセージ、登録完了メッセージの初期化
$errorMessage = "";//ログインボタンが押された場合の条件分岐によって変わる。
$signUpMessage = "";

// セッション開始
session_start();

// ログインボタンが押された場合
if (isset($_POST["signUp"])) {//isset:その変数に値が入っているか
    // 1. ユーザIDの入力チェック
    if (empty($_POST['username'])) {  // 値が空のとき //empty: 変数がからかどうかを検索
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    } else if (empty($_POST["password2"])) {
        $errorMessage = '確認用パスワードが未入力です。';
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && $_POST["password"] === $_POST["password2"]) {
        // 入力したユーザIDとパスワードを格納
        $username = $_POST["username"];
        $password = $_POST["password"];

        // 2. ユーザIDとパスワードが入力されていたら認証する
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        // 3. エラー処理
        try {
            $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $stmt = $pdo->prepare("INSERT INTO users(name, password) VALUES (?, ?)");//??にはexecuteの配列が順番に後から入ってくる。

            $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));  // パスワードのハッシュ化を行う（今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）
            $userid = $pdo->lastinsertid();  // 登録した(DB側でauto_incrementした)IDを$useridに入れる

            $signUpMessage = '登録が完了しました。あなたの登録IDは ' . $userid . ' です。パスワードは ' . $password . ' です。';  // ログイン時に使用するIDとパスワード
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
             echo $e->getMessage();
        }
    } else if ($_POST["password"] != $_POST["password2"]) {
        $errorMessage = 'パスワードに誤りがあります。';
    }
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>新規登録</title>
    </head>
    <body>
        <h1>新規登録画面</h1>
        <form id="loginForm" name="loginForm" action="" method="POST">
            
            <!--<legend>を使用する場合には、<fieldset>～</fieldset>の中の先頭に
            配置します。 <legend>を<fieldset>～</fieldset>の中の先頭に配置すると、 
            親要素となる<fieldset>で定義されたフォーム部品グループのキャプションを表します。!-->
            <fieldset>
                <legend>新規登録フォーム</legend>
                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <div><font color="#0000ff"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></font></div>
                <label for="username">ユーザー名</label><input type="text" id="username" name="username" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["username"])) {
    echo htmlspecialchars($_POST["username"], ENT_QUOTES);
} ?>">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <label for="password2">パスワード(確認用)</label><input type="password" id="password2" name="password2" value="" placeholder="再度パスワードを入力">
                <br>
                <input type="submit" id="signUp" name="signUp" value="登録">
            </fieldset>
        </form>
    </body>
    <!-- labelタグにより項目名をクリックしただけで構成部品に記入できる。
    placeholder属性でフォーム内に記入できる -->
</html>
