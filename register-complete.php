<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'includes/header.php';



// フォームの値を取得
$name = $_POST['name'] ?? '';
$name_kana = $_POST['name_kana'] ?? '';
$zip1 = $_POST['zip1'] ?? '';
$zip2 = $_POST['zip2'] ?? '';
$address = $_POST['address'] ?? '';
$email = $_POST['email'] ?? '';
$password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

// データベース接続
$pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8','root','');

// SQL（会員登録）
$sql = $pdo->prepare(
'INSERT INTO customers(name, furigana, postcode_a, postcode_b, address, mail, password)
VALUES (?, ?, ?, ?, ?, ?, ?)'
);

// 実行
$sql->execute([
$name,
$name_kana,
$zip1,
$zip2,
$address,
$email,
$password
]);

$_SESSION['customer'] = [
    'name' => $name,
    'email' => $email
];
?>
    <title>C.C.Donuts | register-complete 会員登録完了</title>
<?php
if (isset($_SESSION['customer'])) {
    // ▼ ログイン成功時：echoスタイル ▼ //
echo '<div id="product-list-nav">';

echo '    <nav class="breadcrumbNav" aria-label="パンくずリスト">';
echo '        <ul class="breadcrumbList">';
echo '            <li class="breadcrumbItem"><a href="Top.php">Top</a></li>';
echo '            <li class="breadcrumbItem"><a href="login-input.php">ログイン</a></li>';
echo '            <li class="breadcrumbItem"><a href="register-site.php">会員登録</a></li>';
echo '            <li class="breadcrumbItem"><a href="register-input.php">入力確認</a></li>';
echo '            <li class="breadcrumbItem">会員登録完了</li>';
echo '        </ul>';
echo '    </nav>';

    // ユーザー名 //
echo '    <div class="login-Complete-UserName">';
echo '        <label>ようこそ ' . $_SESSION['customer']['name'] . ' 様</label>';
echo '    </div>';
echo '</div>';

echo '<section class="Complete-site">';
echo '    <div class="login-Complete-item">';
echo '        <div class="Complete-title">会員登録完了</div>';
echo '    </div>';

echo '    <div class="Complete-sign">';
echo '        <p class="Complete">会員登録が完了しました。</p>';

echo '        <p class="continued">ログインページへお進みください。</p>';

echo '        <div class="login-Purchase">';
echo '            <a href="Credit-info-site.php">クレジットカード登録へすすむ</a>';
echo '        </div>';
echo '        <div class="login-top">';
echo '            <a href="cart.php">購入確認ページへすすむ</a>';
echo '        </div>';
echo '    </div>';
echo '</section>';

} 
require 'includes/footer.php'; ?>

<?php
// htmlspecialchars() を使用することで
// ユーザー入力をHTMLエスケープし、XSS攻撃を防止する
?>