<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'includes/header.php';

$name = $_POST['name'] ?? '';
$card_number = $_POST['card_number'] ?? '';
$card_type = $_POST['card_type'] ?? '';
$exp_year = $_POST['exp_year'] ?? '';
$exp_month = $_POST['exp_month'] ?? '';
$security_code = $_POST['security_code'] ?? '';
?>

    <title>C.C.Donuts|credit-info-input</title>
    <div id="product-list-nav">
        <nav class="breadcrumbNav" aria-label="パンくずリスト">
            <ul class="breadcrumbList">
                <li class="breadcrumbItem"><a href="index.php">Top</a></li>
                <li class="breadcrumbItem"><a href="cart.php">カート</a></li>
                <li class="breadcrumbItem"><a href="purchase-site.php">購入確認</a></li>
                <li class="breadcrumbItem"><a href="credit-info-site.php">カード情報</a></li>
                <li class="breadcrumbItem">情報確認</a></li>
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
    </div><!--nav-->
    <section class="register-input-site">
        <div class="credit-title-item">
            <div class="credit-title-input">入力情報確認</div>
        </div>
        <form action="credit-info-complete.php" method="post" class="register-input-form">
        <!-- 注意書き表示 -->
            <div class="form-input-item">
                <p class="credit-note">
                    <span>※本ページはポートフォリオ用の模擬サイトです。</span>
                    <span>実在のカード番号は入力しないでください。</span>
                </p>
            </div>
        <!-- お名前 -->
            <div class="form-input-item">
                <label>お名前</label>
                <p class="confirm-text">
                    <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <input type="hidden" name="name"
                value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
        <!-- カード番号 -->
            <div class="form-input-item">
                <label>カード番号</label>
                <p class="confirm-text">
                    **** **** **** <?php echo substr($card_number, -4); ?>
                </p>
                <input type="hidden" name="card_number"
                value="<?php echo htmlspecialchars($card_number, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
        <!-- カード会社 -->
            <div class="form-input-item">
                <label>カード会社</label>
                <p class="confirm-text">
                    <?php echo htmlspecialchars($card_type, ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <input type="hidden" name="card_type"
                value="<?php echo htmlspecialchars($card_type, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
        <!-- 有効期限 -->
            <div class="expiry-input">
                <label>有効期限</label>
                    <p class="expiry-line">
                        <span class="expiry-number">
                            <?php echo htmlspecialchars($exp_year, ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                        <span class="expiry-unit">年</span>
                        <span class="expiry-number">
                            <?php echo htmlspecialchars($exp_month, ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                        <span class="expiry-unit">月</span>
                    </p>

                <input type="hidden" name="exp_year"
                    value="<?php echo htmlspecialchars($exp_year, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="exp_month"
                    value="<?php echo htmlspecialchars($exp_month, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
        <!-- セキュリティコード -->
            <div class="form-input-item">
                <label>セキュリティコード</label>
                <p class="security-code-input">******</p>
            </div>
        <!-- 登録 -->
            <input type="submit" class="submit-btn" value="登録する">
        </form>
    </section>
<?php require 'includes/footer.php'; ?>

