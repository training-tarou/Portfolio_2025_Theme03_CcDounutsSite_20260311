<?php
session_start();
require 'includes/header.php';

$name = $_POST['name'] ?? '';
$name_kana = $_POST['name_kana'] ?? '';
$zip1 = $_POST['zip1'] ?? '';
$zip2 = $_POST['zip2'] ?? '';
$address = $_POST['address'] ?? '';
$email = $_POST['email'] ?? '';
$email_confirm = $_POST['email_confirm'] ?? '';
$password = $_POST['password'] ?? '';
$password_confirm = $_POST['password_confirm'] ?? '';
?>

    <title>C.C.Donuts|register-input会員登録入力確認</title>
    <div id="product-list-nav">
        <nav class="breadcrumbNav" aria-label="パンくずリスト">
            <ul class="breadcrumbList">
                <li class="breadcrumbItem"><a href="index.php">Top</a></li>
                <li class="breadcrumbItem"><a href="login-input.php">ログイン</a></li>
                <li class="breadcrumbItem"><a href="register-input.php">会員登録</a></li>
                <li class="breadcrumbItem"><a href="#">会員入力</a></li>
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
    </div><!--nav-->
    </div><!--product-list-nav-->
    <section class="site">
        <div class="item">
            <div class="title">入力画面</div>
        </div>
        <form action="register-complete.php" method="post" class="register-input-form">
            <!--名前-->
            <div class="form-input-item">
                <label>お名前</label>
                <p class="form-input-name">
                    <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <input type="hidden" name="name" placeholder="例)ドーナツ太郎" required
                value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <!--フリガナ-->
            <div class="form-input-item">
                <label>名前フリガナ</label>
                <p class="form-input-name_kana">
                    <?php echo htmlspecialchars($name_kana, ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <input type="hidden" name="name_kana" class="form-input-name_kana" placeholder="例)ドーナツタロウ" required
                value="<?php echo htmlspecialchars($name_kana, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <!--郵便番号-->
            <div class="form-input-item">
                <label>郵便番号</label>
                <p class="form-input-zip1">
                <?php echo htmlspecialchars($zip1, ENT_QUOTES, 'UTF-8'); ?>
                -
                <?php echo htmlspecialchars($zip2, ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <input type="hidden" name="zip1"
                value="<?php echo htmlspecialchars($zip1, ENT_QUOTES, 'UTF-8'); ?>">

                <input type="hidden" name="zip2"
                value="<?php echo htmlspecialchars($zip2, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <!--住所-->
            <div class="form-input-item">
                <label>住所</label>
                <p class="form-input-address">
                    <?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <input type="hidden" name="address" class="form-input-address" placeholder="例)千葉県〇〇市中央1-1-1" required
                value="<?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <!-- メール -->
            <div class="form-input-item">
                <label>メールアドレス</label>
                <p class="form-input-email">
                    <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <input type="hidden" name="email"
                value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <!-- メール確認 -->
            <div class="form-input-item">
                <label>メールアドレス（確認用）</label>
                <p class="email_confirm-input">
                <?php echo htmlspecialchars($email_confirm, ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <input type="hidden" name="email_confirm" class="email_confirm-input" placeholder="例)123@gmail.com" required
                value="<?php echo htmlspecialchars($email_confirm, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <!-- パスワード -->
            <div class="form-input-item">
                <label>パスワード</label>
                <p>●●●●●●●●</p>
                <input type="hidden" name="password" class="password-input" required
                value="<?php echo htmlspecialchars($password, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <!-- パスワード確認 -->
            <div class="form-input-item">
                <label>パスワード（確認用)</label>
                <p>●●●●●●●●</p>
                <input type="hidden" name="password_confirm" class="password_confirm-input" required
                value="<?php echo htmlspecialchars($password_confirm, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <!-- 登録 -->
            <input type="submit" class="submit-btn" value="登録する">
        </form>
    </section>
<?php require 'includes/footer.php'; ?>

