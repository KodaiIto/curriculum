<?php
    //切り上げ
    $x = 2.7;
    echo ceil($x). '<br>';

    //切り捨て
    $y = 5.4;
    echo floor($y). '<br>';

     //四捨五入
    $x = 3.6;
    echo round($x). '<br>';

    //円周率
    function circle($x) {
        $area = $x * $x * pi();
        return $area;
    }
    echo circle(6). '<br>';

    //乱数
    echo mt_rand(30,60). '<br>';
    
    //文字列の長さ
    $name = "ItoKodai";
    echo strlen($name). '<br>';

    //検索
    $name = "Sakamoto";
    echo strpos($name, "t"). '<br>';

    //文字列の切り取り
    $name = "Saigo";
    echo substr($name, 0, 3). '<br>';

    //置換え
    $name = "K roki";
    echo str_replace(" ", "u", $name). '<br>';

    //フォーマット化した文字列を出力
    $cun = "日本";
    $year = 23;
    $mon = 3;
    printf("私は%sで生まれてから、%d年と%02dヶ月住んでいます。", $cun, $year, $mon);
    echo '<br>';

    //変数に代入できる関数（sprintf）
    $str = sprintf("私は%sで生まれてから、%d年と%02dヶ月住んでいます。", $cun, $year, $mon);
    echo $str;
?>