<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// 1. データベースに接続
$pdo = new PDO('mysql:host=localhost;dbname=tailgan449_ccdonuts20260311;charset=utf8', 'tailgan449_ccdonuts20260311', 'PWdonuts260311');

// 2. カートの中身があるか確認
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $quantity) {
        // 3. SQLで売上数（sales_count）を更新（今の数 ＋ 買った数）
        $sql = $pdo->prepare('UPDATE products SET sales_count = sales_count + ? WHERE id = ?');
        $sql->execute([$quantity, $id]);
    }

    // 4. 購入が終わったのでカートを空にする
    unset($_SESSION['cart']);
}
require 'includes/header.php';
?>

<title>C.C.Donuts | 購入完了</title>

<?php

// カートが空ならトップへ
if (empty($_SESSION['cart'])) {
    header('Location: index.php');
    exit;
}

// カートの商品数
$total_quantity = array_sum($_SESSION['cart']);

// カートを空にする（購入完了）
unset($_SESSION['cart']);

?>
<div id="product-list-nav">

    <nav class="breadcrumbNav" aria-label="パンくずリスト">
        <ul class="breadcrumbList">
        <li class="breadcrumbItem"><a href="index.php">Top</a></li>
        <li class="breadcrumbItem"><a href="cart.php">カート</a></li>
        <li class="breadcrumbItem"><a href="purchase-site.php">購入確認</a></li>
        <li class="breadcrumbItem">購入完了</li>
        </ul>
    </nav>

        <div class="login-Complete-UserName">
        <label>
        ようこそ
        <?php
        if (isset($_SESSION['customer'])) {
        echo $_SESSION['customer']['name'].' 様';
        }else{
        echo 'ゲスト様';
        }
        ?>
        </label>
        </div>
</div>

<section class="Complete-site">
    <div class="Complete-item">
        <div class="purchase-Complete-title">ご購入完了</div>
    </div>

    <div class="Complete-sign">
        <p class="Complete">
        ご購入いただきありがとうございます。
        </p>
        <p class="continued">
        今後ともご愛顧の程、宜しくお願いいたします。
        </p>
        <div class="login-Purchase">
        <a href="index.php">TOPページへすすむ</a>
        </div>
    </div>
</section>

<?php require 'includes/footer.php'; ?>



