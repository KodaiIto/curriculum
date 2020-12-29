<?php
    require_once("db_connect.php");
    require_once("function.php");
    check_user_logged_in();
    
    if(isset($_POST['post'])) {
        if(empty($_POST['title'])) {
            echo "タイトルが未入力です。";
        } elseif(empty($_POST['content'])) {
            echo "コンテンツが未入力です。";
        }

        if(!empty($_POST['title'] && $_POST['content'])){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $pdo = connect();

            try {
                $article_sql = "INSERT INTO posts(title,content) VALUES(:title,:content)";
                $stmt = $pdo->prepare($article_sql);
                $stmt->bindParam(':title',$title);
                $stmt->bindParam(':content',$content);
                $stmt->execute();
                echo "記事登録完了！";
            } catch(PDOException $e) {
                echo 'Error:'. $e->getMessage;
                die();
            }
        } 
    
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>記事登録</title>
</head>
<body style="font-family: MS PGothic, sans-serif;">
    <h1>記事登録</h1>
    <form method="post" action="">
        title:<br>
        <input type="text" name="title" id="title" style="width:200px;height:50px;" ><br>
        content:<br>
        <input type="text" name="content" id="content" style="width:200px;height:100px;" ><br>
        <input type="submit" value="submit" name="post" id="post"><br>
        <!-- <a href="main.php">ホームへ戻る</a> -->
    </form>
</body>
</html>