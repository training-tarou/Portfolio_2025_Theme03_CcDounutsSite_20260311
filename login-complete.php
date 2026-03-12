

<?php
// --- A. まずログイン処理をすべて終わらせる ---
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// 1. セッションをリセット
unset($_SESSION['customer']);
// 2. データベース接続
$pdo = new PDO('mysql:host=localhost;dbname=tailgan449_ccdonuts20260311;charset=utf8', 'tailgan449_ccdonuts20260311', 'PWdonuts260311');


// 4・5. 実行
$sql = $pdo->prepare('select * from customers where mail=? and password=?');
$sql->execute([$_POST['login'], $_POST['password']]);

// 6. 結果を保存
foreach ($sql as $row) {
    $_SESSION['customer'] = [
        'id' => $row['id'], 
        'name' => $row['name'], 
    ];
}
// --- B. ログイン処理が終わった「後」でヘッダーを読み込む ---
require 'includes/header.php'; 
?>

<title>C.C.Donuts | login-completeログイン完了</title>

<?php
// ここから下の表示処理(if(isset...))はそのままでOKです！
if (isset($_SESSION['customer'])) {
    // 成功時の表示...
} else {
    // 失敗時の表示...
}
?>
    <title>C.C.Donuts | login-completeログイン完了</title>
<?php
if (isset($_SESSION['customer'])) {
    // ▼ ログイン成功時：echoスタイル ▼ //
echo '<div id="product-list-nav">';

echo '    <nav class="breadcrumbNav" aria-label="パンくずリスト">';
echo '        <ul class="breadcrumbList">';
echo '            <li class="breadcrumbItem"><a href="index.php">top</a></li>';
echo '            <li class="breadcrumbItem"><a href="login-site.php">ログイン</a></li>';
echo '            <li class="breadcrumbItem">ログイン完了</li>';
echo '        </ul>';
echo '    </nav>';

    // ユーザー名 //
echo '    <div class="login-Complete-UserName">';
echo '        <label>ようこそ ' . $_SESSION['customer']['name'] . ' 様</label>';
echo '    </div>';
echo '</div>';

echo '<section class="Complete-site">';
echo '    <div class="Complete-item">';
echo '        <div class="Complete-title">ログイン完了</div>';
echo '    </div>';

echo '    <div class="Complete-sign">';
echo '        <p class="Complete">ログインが完了しました。</p>';
echo '        <p class="continued">引き続きお楽しみください</p>';

echo '        <div class="login-Purchase">';
echo '            <a href="purchase-site.php">購入確認ページにすすむ</a>';
echo '        </div>';
echo '        <div class="login-top">';
echo '            <a href="index.php">TOPページにもどる</a>';
echo '        </div>';
echo '    </div>';
echo '</section>';

} else {
// ▼ ログイン失敗時：echoスタイル ▼//

echo '<section class="Complete-site">';
echo '    <div class="Complete-item">';
echo '        <div class="Complete-title">ログイン失敗</div>';
echo '    </div>';

echo '    <div class="Complete-sign">';
echo '        <p class="Complete">';
echo '            メールアドレスまたはパスワードが違います。';
echo '        </p>';

echo '        <div class="login-top">';
echo '            <a href="login-site.php">ログイン画面にもどる</a>';
echo '        </div>';
echo '    </div>';
echo '</section>';
}
?>
<?php require 'includes/footer.php'; ?>



