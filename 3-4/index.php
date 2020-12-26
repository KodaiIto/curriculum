<?php 
require_once('getData.php');
$x = new getData();
$login_data = $x->getUserData();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>3章チェックテスト</title>
</head>
<body>
    <header>
        <div class="yi_logo"><img src="img.png" alt="ロゴ" width="200px" height="120px"></div>
        <div class="name_data">ようこそ  <?php echo $login_data['last_name']. $login_data['first_name']; ?>  さん</div>
        <div class="last_login">最終ログイン日:<?php echo $login_data['last_login']; ?></div>
        </header>

    <div class = "main clearfix">
            <table>
                <tr bgcolor='#87ceeb'>
                    <th>記事ID</th>
                    <th>タイトル</th>
                    <th>カテゴリ</th>
                    <th>本文</th>
                    <th>投稿日</th>
                </tr>

                <?php 
                $article_data = $x->getPostData(); 
                foreach($article_data as $value) {

                    echo "<tr bgcolor = '#e0ffff'>";
                    echo "<td>". $value['id']. "</td>";
                    echo "<td>". $value['title']. "</td>";
                    echo "<td>";

                    $str = $value['category_no'];
                    $category_int = intval($str);

                    if($category_int===1) {
                        echo "食事";
                    } elseif($category_int===2) {
                        echo "旅行";
                    } else {
                        echo "その他";
                    }

                    echo "</td>";
                    echo "<td>". $value['comment']. "</td>";
                    echo "<td>". $value['created']. "</td>";
                    echo "</tr>";
                    
                    } ?>
                </table>
            </div>

    <footer>
        Y&I group.inc
    </footer>
</body>
</html>
