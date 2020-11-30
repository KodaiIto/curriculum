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
    //[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
    $num = $_POST['num'];
    $lang = $_POST['lang'];
    $command = $_POST['command'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    $my_name = $_POST['my_name'];

    //選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
    function result1($num) {
        if ($num == 80) {
            print ("正解！");
        } else {
            print ("残念・・・");
        }
    }
    function result2($lang) {
        if ($lang == "HTML") {
            print ("正解！");
        } else {
            print ("残念・・・");
        }
    }
    function result3($command) {
        if ($command == "select") {
            print ("正解！");
        } else {
            print ("残念・・・");
        }
    }
    ?>

    <p><!--POST通信で送られてきた名前を表示--><?php echo $my_name; ?>さんの結果は・・・？</p>

    <p>①の答え</p>

    <!--作成した関数を呼び出して結果を表示-->
    <?php echo result1 ($num); ?>
    
    <p>②の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php echo result2($lang); ?>

    <p>③の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php echo result3($command); ?>
</div>
</body>
</html>
