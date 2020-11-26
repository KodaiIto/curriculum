＜ファイルが書き込み可能なのか確認する＞<br>
<?php
    $testFile = "test.txt";
    $contents = "こんにちは！";

    /*まず、書き込み対象のファイルを変数に入れておく
    ファイル名は今後何度か使用するので、初めに変数に入れておけば、
    後で変更する時も修正箇所が少なく済む。
    あとは書き込む文字も変数にしておく */

    if (is_writable($testFile)) {

        //書き込み可能な時の処理
        //とりあえず、確認のため、echoで表示させる。
        echo "writable!!";

    } else {
        //書き込み不可の時の処理
        echo "not writable!";
        exit;
    }
    echo '<br>';

    /*まずは、ファイルが書き込み可能なのかどうか調べる
    パーション（書き込み権限）次第では、書き込めないこともありえる
    ➡︎ is_writableメソッドを使う！
    is_writable($testFile)で、$testFileが書き込み可能なのかどうか
    True/Faleseで返してくれます。*/
    var_dump (is_writable($testFile));

    //そのため、書き込み可能な場合と、不可の場合で条件を分けておきます。
    //書き込み不可だった場合は、exitで処理を終了！
    
    echo '<br><br>';
    ?>


＜書き込みをする＞<br>
<?php
    $testFile = "test.txt";
    $contents = "こんにちは！";

    if (is_writable($testFile)) {
        //書き込み可能な時の処理

        $fp = fopen($testFile, "w");
        //対象のファイルを開く

        fwrite($fp, $contents);
        //対象のファイルに書き込む

        fclose($fp);
        //ファイルを閉じる

        echo "finish writhing!!";
        //書き込みした旨の表示

    } else {
        echo "not writable!";
        //書き込み不可の時の処理

        exit;
        //exitで処理終了
    }
    /*書き込みが可能だった場合は、手順に従い書き込みします
    1. fopen() ~対象のファイルを開く関数
        第二引数にてのwの使用理由は後ほど
        ファイルを開いた状態を$fpという変数に格納！
    2. fwrite関数で、書き込む！
       第一引数で、＄fp(開いたファイル)を、第二引数に書き込む
       文字列を渡す   
    3. 最後にファイルを閉じます
       fclose() ~対象のファイルを閉じる関数
       開きっぱなしだと無駄なメモリを消費してしまう*/

    echo '<br><br>';
    ?>


＜書き込みモード＞<br>
<?php
    /*何回アクセスしても、こんにちは!は一つしか記入されない
    →書き込みモードが関与！
    先ほどのfopen関数にて、wを追記したが、
    wを指定すると、完全上書きとなる！
    ＝元々のデータを消して新しく作成してくれる*/

    //このwをaに変えてみよう！
    if (is_writable($testFile)) {
        $fp = fopen($testFile, "a");
        fwrite($fp, $contents);
        fclose($fp);
        echo "finish writhing!!";
    } else {
        echo "not writable!";
        exit;
    }
    /*aは追記モードなので、こんにちは！の末尾にこんにちは！
    書き込みモード、及び読み込みモードについては種類がある
    一旦は３つ
    ・w、a、r(読み込み) */

    echo '<br><br>';
    ?>


＜ファイルからデータを読み込む＞<br>
<?php
    //1. ファイルの準備
    /*書き込みとほぼ同じ。まずはtest2.txtを用意して、
    こんにちは！と書く。 */

    //2. ファイルの読み込み
    $test_file = "test2.txt";
    var_dump (is_readable($test_file));
    echo '<br>';

    if (is_readable($test_file)) {
        //読み込み可能な時の処理

        $fp = fopen($test_file, "r");
        //対象のファイルを開く

        while ($line = fgets($fp)) {
            //開いたファイルから1行ずつ読み込む

            echo $line. '<br>';
            //改行コード込みで1行ずつ出力
        }

        fclose($fp);
        //ファイルを閉じる

    } else {
        echo "not readable!";
        //読み込み不可の時の処理

        exit;
        //exitで処理を終了
    }
    ?>