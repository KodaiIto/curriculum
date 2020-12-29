<?php
define('DB_DATABASE', 'YIGroupBlog');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DSN', 'mysql:host=localhost;charset=utf8;dbname=' . DB_DATABASE);

function connect() {
    try{
        $pdo = new PDO(DSN,DB_USER,DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e){
        echo 'Error:'. $e->getMessage();
        die();
    }
}

?>
