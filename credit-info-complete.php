
<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
// 0.セッションを開始
session_start(); 
require 'includes/header.php';

// 1. セッションを空にする（以前のログイン情報を消す）
//unset($_SESSION['customer']);

// 2. データベース接続
$pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8', 'root', '');


// 3. 入力値を受け入れる(この内容は、生成AIより入手)
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

// 4. SQLの準備（メールアドレスとパスワードで検索）
$sql = $pdo->prepare('select * from customers where mail=? and password=?');

// 5. 実行（$_POSTはすべて大文字！）
$sql->execute([$login, $password]);

// 6. 結果をセッションに保存(この内容は、生成AIより入手)
$row = $sql->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $_SESSION['customer'] = [
        'id' => $row['id'],
        'name' => $row['name']
    ];
}
?>
    <title>C.C.Donuts | ログイン完了</title>
<?php
if (isset($_SESSION['customer'])) {
    // ▼ ログイン成功時：echoスタイル ▼ //
echo '<div id="product-list-nav">';

echo '    <nav class="breadcrumbNav" aria-label="パンくずリスト">';
echo '        <ul class="breadcrumbList">';
echo '            <li class="breadcrumbItem"><a href="top.php">Top</a></li>';
echo '            <li class="breadcrumbItem"><a href="cart.php">カート</a></li>';
echo '            <li class="breadcrumbItem"><a href="purchase-site.php">購入確認</a></li>';
echo '            <li class="breadcrumbItem"><a href="credit-info-site.php">カード情報</a></li>';
echo '            <li class="breadcrumbItem"><a href="credit-info-input.php">情報確認</a></li>';
echo '            <li class="breadcrumbItem">登録完了</li>';
echo '        </ul>';
echo '    </nav>';

    // ユーザー名 //
echo '    <div class="login-Complete-UserName">';
echo '        <label>ようこそ ' . $_SESSION['customer']['name'] . ' 様</label>';
echo '    </div>';
echo '</div>';

echo '<section class="Complete-site">';
echo '    <div class="Complete-item">';
echo '        <div class="credit-Complete-title">カード情報登録完了</div>';
echo '    </div>';

echo '    <div class="Complete-sign">';
echo '        <p class="login-Complete">支払い情報登録が完了しました。</p>';
echo '        <p class="login-continued">続けて購入確認ページへお進みください。</p>';

echo '        <div class="login-top">';
echo '            <a href="product_detail.php">購入確認ページへすすむ</a>';
echo '        </div>';
echo '    </div>';
echo '</section>';

} else {
// ▼ ログイン失敗時：echoスタイル ▼//

echo '<section class="login-Complete-site">';
echo '    <div class="login-Complete-item">';
echo '        <div class="login-Complete-title">ログイン失敗</div>';
echo '    </div>';

echo '    <div class="Complete-sign">';
echo '        <p class="login-Complete">';
echo '            メールアドレスまたはパスワードが違います。';
echo '        </p>';

echo '        <div class="login-top">';
echo '            <a href="login-site.php">ログイン画面にもどる</a>';
echo '        </div>';
echo '    </div>';
echo '</section>';
}

 require 'includes/footer.php';
 ?>




