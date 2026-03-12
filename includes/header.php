<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/reset.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
  <title>C.C.Donuts|header</title>
</head>
<body>
    <header class="site-header">
         <!-- ハンバーガーメニュー（左） -->
        <div class="header-hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- メインロゴ（中央） -->
        <div class="header-mainlogo"></div>
        <!-- USER actions（右） -->
        <div class="header-user-actions">
        <?php if(isset($_SESSION['customer'])): ?>
            <a href="logout.php" class="header-action_logout-icon">
                <span>ログアウト</span>
            </a>
        <?php else: ?>
            <a href="login-site.php" class="header-action_login">
                <span>ログイン</span>
            </a>
        <?php endif; ?>
            <a href="cart.php" class="header-action_cart">
            <span>カート</span>
            </a>
        </div>
        <!-- 検索エリア-->
        <div class="header-search-area">
            <span class="header-search-icon"></span>
            <input type="text" placeholder="">
        </div>
    </header>

           <!-- ドロアーメニュー -->
            <nav class="drawer" id="drawer">
                <div class="dTop">
                    <div class="dLogo">
                    <div class="drawerIcon" aria-label="ドロワーアイコン"></div>
                    </div>
                    <div class="dIcon" id="closeNav"></div>
                </div>
                <ul class="drawer-list">
                    <li><a href="index.php">TOP</a></li>
                    <li><a href="product-list.php">商品一覧</a></li>
                    <li><a href="#">よくある質問</a></li>
                    <li><a href="#">お問い合わせ</a></li>
                    <li><a href="#">当サイトのポリシー</a></li>
                </ul>
            </nav>
       