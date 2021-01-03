＜EXTRA問題＞<br>
・ループ文×条件分岐<br>
<?php
    for ($num = 1; $num <= 40; $num++) {
            $rand = mt_rand(1, 6);/*この$rand=mt_rand(1,6)はfor（）に入れたらダメ！*/
            printf ("%d回目=%d", $num, $rand);
            echo '<br>';
            $total += $rand;
            if($total >= 40) {
                printf ("合計%d回でゴールしました", $num);
                break;
            }
    } 
    echo '<br>';
    
    // すごろくの問題はどんな変数が必要なのか、といったところから
    // ロジックを考える練習ができる問題でしたね。 
    // 「$rand = mt_rand(1, 6);」の部分で一点だけ！ 
    // 変数名を見ただけで中身が想像できたり、
    // 連想できる名前にした方が良いのでサイコロと言う意味で「
    // $dice」などにするとわかりやすいかなと思います！ 
    ?><br><br>

・関数×条件分岐<br>
<?php
    date_default_timezone_set('Asia/Tokyo');
    $now_time = intval(date("H", time()));
    if($now_time > 2 && $now_time < 12) {
        printf ("「今、%d時台です。<br>おはようございます！」", $now_time);
    } elseif($now_time > 11 && $now_time < 18) {
        printf ("「今。%d時台です。<br>こんにちは！」",$now_time);
    } else {
         printf ("「今、%d時台です。<br>こんばんわ！」",$now_time);
    }
    echo '<br>';
    
    ?>

