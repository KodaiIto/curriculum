<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();

if(isset($_POST['register'])) {

    if(empty($_POST['title'])){
        echo 'タイトルが未入力です。';
    }
    if(empty($_POST['date'])  ) {
        echo '発売日の記入に誤りがあります。(記入例:2020/01/01:2020-01-01:)※半角英数字でお願いします！';
    }
    if(empty($_POST['stock'])) {
        echo '在庫数が未入力です。';
    }
    if(!empty($_POST['title'] && $_POST['date'] && $_POST['stock']) ) {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $stock = $_POST['stock'];
        $pdo = db_connect();
        try {
            $stock_sql = "INSERT INTO books(title, date, stock) VALUES(:title, :date, :stock)";
            $stock_data = $pdo->prepare($stock_sql);
            $stock_data->bindParam(':title', $title);
            $stock_data->bindParam(':date', $date);
            $stock_data->bindParam(':stock', $stock);
            $stock_data->execute();
            echo '本登録完了';
        } catch(PDOException $e) {
            echo 'Error:'. $e->getMessage();
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>本登録画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="font-family: MS PGothic, sans-serif;">
<main>
    <div class="main_header">本 登録画面</div>
    <form method="POST" action="">
        <input type="text" name="title" id="title" placeholder="タイトル" class="books_title"><br>
        <input type="date" name="date" id="date" placeholder="発売日" class="books_date"><br>
        <div class="stock_title" style="font-size: 10px;">在庫数</div>
        <select required name="stock" id="stock" class="stock">
            <option disabled selected value >選択してください</option> 
            <?php for($i=0;$i<=30;$i++) { ?>
                <option value="<?php echo $i; ?>">
                <?php echo $i; ?>
                </option>
            <?php } ?>
        </select><br>
        <input type="submit" name="register" id="register" value="登録" class="btn">
    </form>
</body>
</html>