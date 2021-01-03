<form action="result.php" method="post">
    <!--textboxの作成-->
    お名前：<input type="text" name="my_name" /><br>

    <!--password記入欄-->
    パスワード：<input type="password" name="password" /><br>

    <!--性別-->
    性別：
        <input type="radio" name="sex" value="男性" />男性
        <input type="radio" name="sex" value="女性" />女性
        <!--radioのnameは一緒にする。-->
    <br>

    <!--隠しフォーム-->
    <input type="hidden" name="hidden_param" value="隠しパラメータから" /><br>

    <!--selectタグ-->
    年齢1：
        <select name="age1">
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
        </select>
    <br>
    <!--PHPのループ文と併用-->
    年齢2：
        <select name="age2">
            <?php for ($i=0;$i<=100;$i++) { ?>
                <option value="<?php echo $i; ?>">
                <?php echo $i; ?>
                </option>
            <?php } ?>
        </select>
    <br>
    <!--index.php側で属性名を同じにしても出力されるが、、、
    result.php側では、値を渡した時に値が上書きされる。-->

    <!--送信フォーム-->
    <input type="submit" value="送信するよ！" />

    <br><br><br>



    <!--ここから課題です！-->
    <!--・景品応募フォームを想定し、名前、景品選択、
      個数の入力欄を用意します。
    ・名前はtextで入力します。
    ・景品はradioで準備します。
    ・個数はselectタグとし、1から10まで選択可能としてください。
    ・各name属性はお任せします。-->
    
    ＜課題＞<br>
    お名前：<input type="text" name="my_name" /><br>
    ご希望商品：<input type="radio" name="award" value="A賞" />A賞
              <input type="radio" name="award" value="B賞" />B賞
              <input type="radio" name="award" value="C賞" />C賞
              <br>      
    個数：<select name="number">
            <?php for ($i=1;$i<=10;$i++) { ?>
                <option value="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </option>
            <?php } ?>
         </select>      
         <br>
    <input type="submit" value="申込" />      
</form>
<!--HTMLにPHPを組み込むときはインデント（字下げ）に注意する。-->