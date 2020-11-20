<?php
echo "＜課題＞" . '<br>';
function Rectangular($length, $width, $height) {
    $volume  = $length * $width * $height;
    print "直方体の体積は" . $volume . "です！";
}
Rectangular(5 , 10 , 8);
echo '<br>';

?>