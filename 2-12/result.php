<?php
    $my_name = $_POST['my_name'];
    $password = $_POST['password'];
    $sex = $_POST['sex'];
    $hidden_param = $_POST['hidden_param'];
    $age1 = $_POST['age1'];
    $age2 = $_POST['age2'];
    ?>
    <p>私の名前は、<?php echo $my_name; ?> です。</p>
    <p>パスワードは、<?php echo $password; ?> です。</p>
    <p>性別は、<?php echo $sex; ?> です。</p>
    <p>性別は、<?php echo $hidden_param; ?> です。</p>
    <p>年齢1は、<?php echo $age1; ?> です。</p>
    <p>年齢2は、<?php echo $age2; ?> です。</p>

    <br><br><br>



<!--ここから課題です！-->
＜課題＞
<?php
    $my_name = $_POST['my_name'];
    $award = $_POST['award'];
    $number = $_POST['number'];
?>
<p>お名前：<?php echo $my_name; ?></p>
<p>ご希望商品：<?php echo $award; ?></p>
<p>個数：<?php echo $number; ?></p>
    
