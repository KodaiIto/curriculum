<?php
require_once('db_connect.php');

require_once('function.php');

check_user_logged_in();

$id = $_GET['id'];
redirect_main_unless_parameter($id);

$row = find_post_by_id($id);
//関数から取得した値を格納
$id = $row['id'];
$title = $row['title'];
$content = $row['content'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>記事編集</title>
</head>
<body style="font-family: MS PGothic, sans-serif;">
    <h1>記事編集</h1>
    <form method="POST" action="edit_done_post.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        title:<br>
        <input type="text" name="title" id="title" style="width:200px;height:50px;" value="<?php echo $title; ?>">
        <br>
        content:<br>
        <input type="text" name="content" id="content" style="width:200px;height:100px;" value="<?php echo $content; ?>">
        <br>
        <input type="submit" name="edit" id="edit" value="submit">
    </form>
</body>
</html>