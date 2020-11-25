<?php
    //count
    $number = [2,4,2,6,5,2];
    echo count($number). '<br><br>';

    //sort
    $cou = ["Japan", "Korea", "China", "America"];
    sort($cou);
    var_dump($cou);
    echo '<br><br>';

    //in_array
    $number = [2,4,2,6,5,2];
    var_dump(in_array(8, $number));
    echo '<br>';
    if (in_array(0, $number)) {
        echo "0あり！";
    } else {
        echo "0なし！";
    }
    echo '<br><br>';

    //implode
    $cou = ["Japan", "Korea", "China", "America"];
    echo implode("+", $cou). "<br>";

    $str = implode("と", $cou);
    echo $str. '<br><br>';

    //explode
    $number = [2,4,2,6,5,2];
    $str = implode("&", $number);
    var_dump($str);
    echo '<br>';

    $re_number = explode("&", $str);
    var_dump($re_number);
    ?>