
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'includes/header.php';

$pdo = new PDO('mysql:host=localhost;dbname=tailgan449_ccdonuts20260311;charset=utf8', 'tailgan449_ccdonuts20260311', 'PWdonuts260311');

$customer = [];
if (isset($_SESSION['customer']['id'])) {
$sql = $pdo->prepare('SELECT name, postcode_a, postcode_b, address FROM customers WHERE id=?');
$sql->execute([$_SESSION['customer']['id']]);
$customer = $sql->fetch(PDO::FETCH_ASSOC);
}



$total_price = 0;
$total_quantity = 0;
?>

    <title>C.C.Donuts|purchase-site</title>
    <div id="product-list-nav">
        <nav class="breadcrumbNav" aria-label="パンくずリスト">
            <ul class="breadcrumbList">
                <li class="breadcrumbItem"><a href="index.php">Top</a></li>
                <li class="breadcrumbItem"><a href="cart.php">カート</a></li>
                <li class="breadcrumbItem">購入確認</a></li>
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
    <section class="purchase-site">
        <div class="purchase-item">
            <div class="purchase-title">ご購入確認</div>
        </div>
        <div class="all-item">
        <div class="purchase-approval">ご購入承認</div>

        <?php
            if (!empty($_SESSION['cart'])) {

            foreach ($_SESSION['cart'] as $id => $quantity) {

            $sql = $pdo->prepare('SELECT * FROM products WHERE id=?');
            $sql->execute([$id]);
            $item = $sql->fetch();

            $total_price += $item['price'] * $quantity;
            $total_quantity += $quantity;
        ?>

            <section class="item_a">
                <div class="itemlist_a">
                    <div class="partition"></div>
                    <div class="Separator">
                        <div class="item">商品名</div>
                        <div class="name-item"><?= htmlspecialchars($item['name']) ?></div>
                    </div>
                    <div class="Separator">
                        <div class="volume">数量</div>
                        <div class="pieces"><?= $quantity ?><span>個</span></div>
                    </div>
                    <div class="Separator">
                        <div class="money">金額</div>
                        <div class="money-item"><span>税込 ￥</span><?= number_format($item['price'] * $quantity) ?></div>
                    </div>
                    <div class="partition"></div>
                </div>
            </section>
            
        </div>
        <?php
        }
        }
        ?>
        <section class="total">
            <div class="total-all">
                <div class="partition"></div>
                <div class="Separator">
                    <div class="volume-total">合計数量</div>
                    <div class="pieces-total"><?= $total_quantity ?></div>
                </div>
                <div class="Separator">
                    <div class="money-total">合計金額</div>
                    <div class="money-item-total">税込 ￥<?= number_format($total_price) ?></div>
                </div>
                <div class="partition"></div>
            </div>
        </section>
        <section class="delivery">お届け先
            <div class="delivery-address">
                <div class="partition"></div>
                <!--名前-->
                <div class="confirm-row">
                    <div class="confirm-label">お名前</div>
                    <div class="confirm-value">
                       <?= htmlspecialchars($customer['name'] ?? '') ?>
                    </div>
                </div>
                <div class="confirm-row">
                    <div class="confirm-label">郵便番号</div>
                    <div class="confirm-value">
                       <?= htmlspecialchars(($customer['postcode_a'] ?? '') . '-' . ($customer['postcode_b'] ?? '')) ?>
                    </div>
                </div>
                <div class="confirm-row">
                    <div class="confirm-label">住所</div>
                    <div class="confirm-value">
                       <?= htmlspecialchars($customer['address'] ?? '') ?>
                    </div>
                </div>
                <div class="partition"></div>
            </div>
        </section>
        <div class="Payment-method">お支払い方法
        <!-- 送信 -->
            <form action="purchase-final.php" method="post">
                <input
                    type="submit"
                    class="submit-btn-method"
                    value="カード情報登録する">
            </form>
        </div>
        <div class="Card-information-not-registered">カード情報登録がまだのお客様はこちらへお進みください。</div>
    </section>
<?php require 'includes/footer.php'; ?>

