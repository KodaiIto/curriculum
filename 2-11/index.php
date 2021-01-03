<form action="result.php" method="post">
  名前：<input type="text" name="my_name" />
  <br>
  メールアドレス：<input type="email" name="email" />
  <br>
  パスワード：<input type="password" name="password" />
  <br>
  <input type="submit" value="送信" />
</form>
<!--今回は問題文に「inputタグのtype属性はtext」と指定があったので
大正解ですが、 「input type="email"」と書くことができます。 
こう書くと、メールアドレスの形式でない場合、
自動でエラーを出してくれたりします。-->




