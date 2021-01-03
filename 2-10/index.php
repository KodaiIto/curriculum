<?php
echo "＜課題＞" . '<br>';
function Rectangular($length, $width, $height) {
    $volume  = $length * $width * $height;
<<<<<<< Updated upstream
    print "直方体の体積は" . $volume . "です！";
=======
    print "直方体の体積は${volume}です！";
>>>>>>> Stashed changes
}
Rectangular(5 , 10 , 8);
echo '<br>';

?>