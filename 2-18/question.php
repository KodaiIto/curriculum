<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2章チェックテスト</title>
    <link rel="stylesheet" href="check.css"> 
</head>
<body>
<div class = "main">

    <?php
    //POST送信で送られてきた名前を受け取って変数を作成
    $my_name = $_POST['my_name'];
    //①画像を参考に問題文の選択肢の配列を作成してください。
    //② ①で作成した、配列から正解の選択肢の変数を作成してください
    ?>

    <p>お疲れ様です<?php echo $my_name; ?><!--POST通信で送られてきた名前を出力-->さん</p>

    <!--フォームの作成 通信はPOST通信で-->
    <form action="answer.php" method="post">

        <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <h2>①ネットワークのポート番号は何番？</h2>
        <br>
        <?php $num =[80, 22, 20, 21]; 
        foreach ($num as $array) { ?>
            <input type="radio" name="num" value="<?php echo $array; ?>" class="radio-plain"/><?php echo $array; ?>
        <?php } ?>
        <br>

        <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <h2>②Webページを作成するための言語は？</h2>
        <br>
        <?php $lang = ["PHP", "Python", "JAVA", "HTML"];
        foreach ($lang as $array) { ?>
            <input type="radio" name="lang" value="<?php echo $array; ?>" class="radio-plain"/><?php echo $array; ?>
        <?php } ?>
        <br>
        
        <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <h2>③MySQLで情報を取得するためのコマンドは？</h2>
        <br>
        <?php $command = ["join", "select", "insert", "update"];
        foreach ($command as $array) { ?>
            <input type="radio" name="command" value="<?php echo $array; ?>" class="radio-plain"/><?php echo $array; ?>
        <?php } ?>
        <br>

        <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
        <?php $answer1 = 80; 
              $answer2 = "HTML"; 
              $answer3 = "select";
        ?>
        
        <input type="hidden" name="answer1" value="<?php echo $answer1; ?>" />
        <input type="hidden" name="answer2" value="<?php echo $answer2; ?>" />
        <input type="hidden" name="answer3" value="<?php echo $answer3; ?>" />
        <input type="hidden" name="my_name" value="<?php echo $my_name; ?>" />
        <input type="submit" value="回答する" />
    </form>
</div>    
</body>
</html>
