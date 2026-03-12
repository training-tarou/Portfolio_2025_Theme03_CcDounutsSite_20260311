<?php
// 1. セッションを開始
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. ログイン情報を削除（customerの箱を空にする）
unset($_SESSION['customer']);

// 3. ヘッダーを読み込む（これでヘッダーは自動的に「ログイン」表示に戻ります）
require 'includes/header.php';
?>

<title>C.C.Donuts | ログアウト</title>

<div id="product-list-nav">
    <nav class="breadcrumbNav" aria-label="パンくずリスト">
        <ul class="breadcrumbList">
            <li class="breadcrumbItem"><a href="index.php">top</a></li>
            <li class="breadcrumbItem">ログアウト</li>
        </ul>
    </nav>

    <div class="top-UserName">
        <p>ようこそ ゲスト様</p>
    </div>
</div>

<section class="Complete-site">
    <div class="Complete-item">
        <div class="Complete-title">ログアウト完了</div>
    </div>

    <div class="Complete-sign">
        <p class="Complete">ログアウトが完了しました。</p>
        <p class="continued">またのご利用をお待ちしております。</p>

        <div class="login-top">
            <a href="index.php">TOPページにもどる</a>
        </div>
    </div>
</section>

<?php 
// 最後にフッターを読み込む
require 'includes/footer.php'; 
?>