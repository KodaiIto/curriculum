<?php
require_once("db_connect.php");
require_once("function.php");
check_user_logged_in();

$id = $_GET['id'];
redirect_main_unless_parameter($id);

$row = find_post_by_id($id);
//関数から取得した値を格納
$id = $row['id'];
$title = $row['title'];
$content = $row['content'];

$pdo = connect();
try{
    $sql_comments = "SELECT * FROM comments WHERE post_id = :post_id";
    $stmt_comments = $pdo->prepare($sql_comments);
    $stmt_comments->bindparam(':post_id',$id);
    $stmt_comments->execute();
} catch(PDOException $e) {
    echo 'Error:' . $e->getMessage;
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>記事詳細</title>
</head>
    <body style="font-family: MS PGothic, sans-serif;">
        <table>
            <tr>
                <td>ID</td>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <td>タイトル</td>
                <td><?php echo $title; ?></td>
            </tr>
            <tr>
                <td>本文</td>
                <td><?php echo $content; ?></td>
            </tr>
        </table>
        <a href="create_comment.php?post_id=<?php echo $id ?>">この記事にコメントする</a><br />
        <a href="main.php">ホームに戻る</a>
        <div>
        <?php
        //結果が１行取得できたら
        while ($row = $stmt_comments->fetch(PDO::FETCH_ASSOC)) {
            echo '<hr>';
            echo $row['name'];
            echo '<br />';
            echo $row['content'];
        }
        ?>
        </div>
    </body>
</html>