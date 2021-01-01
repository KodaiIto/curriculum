<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();

$books_id = $_POST['id'];
redirect_main_unless_parameter($books_id) ;
$pdo = db_connect();
try{
    $sql = "DELETE FROM books WHERE id = :id";
    $delete_stmt = $pdo->prepare($sql);
    $delete_stmt->bindParam(':id',$books_id);
    $delete_stmt->execute();
    
    //main.phpにリダイレクト
    header("Location: main.php");
    exit;
    
} catch(PDOException $e) {
    echo 'Error:'. $e->getMessage;
    die();
}
?>