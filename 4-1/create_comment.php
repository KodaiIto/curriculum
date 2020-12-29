<?php
require_once("db_connect.php");
require_once("function.php");
check_user_logged_in();

//提出ボタンが押された場合
if(!empty($_POST)) {
    //POST送信されたpost＿idを変数に格納しておく
    $post_id = $_POST["post_id"];
    if(empty($_POST["name"])){
        echo '名前が未入力です。';
    } else if(empty($_POST["content"])){
        echo 'コメントが未入力です。';
    }

    if(!empty($_POST["name"] && $_POST["content"])) {
        $name = $_POST["name"];
        $content = $_POST["content"];
        $pdo = connect();
        try {
            $sql_comments = "INSERT INTO comments(post_id,name,content)values(:post_id,:name,:content)";
            $stmt_comments = $pdo->prepare($sql_comments);
            $stmt_comments->bindParam(':post_id',$post_id);
            $stmt_comments->bindParam(':name',$name);
            $stmt_comments->bindParam(':content',$content);
            $stmt_comments->execute();

            //対象のpost_idのdetail_post.phpにリダイレクト
            header("Location: detail_post.php?id=".$post_id);
            exit;
        } catch(PDOException $e){
            echo 'Error:'. $e->getMessage();
            die();
        }
    }
} else {
    //POSTで渡されたデータがなかった場合
    //GETで渡されたpost_idを受け取る
    $post_id = $_GET["post_id"];
    //$post_idが空だった場合は不正な遷移なので、main.phpに戻す
    redirect_main_unless_parameter($post_id);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>コメント</title>
</head>
<body style="font-family: MS PGothic, sans-serif;">
    <h1>コメント</h1>
    <form method="POST" action="">
        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        投稿者名:<br>
        <input type="text" name="name"><br>
        コメント:<br>
        <input type="text" name="content" style="width:200px;height:100px;"><br>
        <input type="submit" valuel="submit">
    </form>
    <a href="detail_post.php?id=<?php echo $post_id; ?>">記事詳細に戻る</a>
</body>
</html>