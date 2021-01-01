<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();

$pdo = db_connect();
try {
    $getbooks_data = "SELECT * FROM books ORDER BY id ASC";
    $stmt = $pdo->prepare($getbooks_data);
    $stmt->execute();
} catch(PDOException $e) {
    echo 'Error:'. $e->getMessage();
    die();
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>メインページ</title>
    <link rel="stylesheet" href="main.css">
</head>
<body style="font-family: MS PGothic, sans-serif;">
<main>
    <div class="header clearfix">
        <div class="title">在庫一覧画面</div>
        <button type="button" onclick="location.href='create_books.php'"class="new_books">新規登録</button>
        <button type="button" onclick="location.href='logout.php'"class="logout">ログアウト</button>
    </div>
    <table >
        <div class="main_title">
            <tr>
                <th style="width:150px;height:35px;">タイトル</th>
                <th style="width:200px;height:35px;">発売日</th>
                <th style="width:100px;height:35px;">在庫数</th>
                <th style="width:150px;height:35px;"></th>
            </tr>
        </div>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td style="width:150px;height:45px;"><?php echo $row['title']; ?></td>
                <td style="width:200px;height:45px;">
                    <?php $replace = str_replace("-","/",$row['date']); 
                          echo $replace; ?>
                </td>
                <td style="width:100px;height:45px;"><?php echo $row['stock']; ?></td>
                <td style="width:150px;height:45px;">
                    <form method="post" action="delete_books.php">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="delete" id="delete" value="削除" class="delete">
                    </form>
                </td>
            </tr>   
        <?php } ?>
    </table>
</main>
</body>
</html>
