
<?php require 'includes/header.php'; ?>
<title>C.C.Donuts|login-siteログイン</title>
    <div id="product-list-nav">
        <nav class="breadcrumbNav" aria-label="パンくずリスト">
            <ul class="breadcrumbList">
                <li class="breadcrumbItem"><a href="index.php">top</a></li>
                <li class="breadcrumbItem"><a href="login-site.php">ログイン</a></li>
            </ul>
        </nav>
        <!-- ユーザー名 -->
        <div class="top-UserName">
            <p>
                ようこそ
                <?php
                if (isset($_SESSION['customer'])) {
                    echo $_SESSION['customer']['name'] . ' 様';
                } else {
                    echo 'ゲスト様';
                }
                ?>
            </p>
        </div>
    </div><!--nav-->
    <section class="site">
        <div class="item">
            <div class="title">ログイン</div>
        </div>
        <form action="login-complete.php" method="post" class="login-sign">
            <div class="address">
                <p>メールアドレス</p>
                <input type="text" name="login" placeholder="(例)123@gmail.com" required>
            </div>
            <div class="pass">
                <p>パスワード</p>
                <input type="password" name="password" placeholder="パスワードを入力してください" required>
            </div> 
            <input type="submit" value="ログイン">
            <div class="login-Registration"><a href="register-site.php">会員登録はこちら</a></div>
        </div>
        
    </section>
</form>
 <?php require 'includes/footer.php'; ?>

