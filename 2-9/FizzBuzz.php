<?php
/* ・３の倍数の時、Fizz!と出力します。
   ・５の倍数の時、Buzz!と出力します。
   ・３の倍数かつ５の倍数の時、FizzBuzz!!と出力します。(15の倍数、と
     と考えるのはナシです。)
   ・3の倍数でも、５の倍数でもない場合は、その数を出力します。
   ・それを１〜100まで実施してください。 */
for($num = 1;$num <= 100;$num++) {
    if($num % 3 ===0 && $num % 5 === 0) {
        echo "FizzBuzz!!";
    } elseif($num % 3 === 0) {
        echo "Fizz!";
    } elseif($num % 5 === 0) {
        echo "Buzz!";
    } else {
        echo $num;
    }
    echo '<br>';
}

?>