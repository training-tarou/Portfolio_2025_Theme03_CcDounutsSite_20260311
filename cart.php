<!--下記のコードのPHPタグの部分は、すべて生成AIに作成したものです。-->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'includes/header.php';

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $quantity = $_POST['quantity'];
  if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = $quantity;
  } else {
    $_SESSION['cart'][$id] += $quantity;
  }
}

if (isset($_POST['delete_id'])) {
  unset($_SESSION['cart'][$_POST['delete_id']]);
}

if (isset($_POST['update_id'])) {
  $_SESSION['cart'][$_POST['update_id']] = $_POST['update_quantity'];
}

$pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8', 'root', '');

foreach ($_SESSION['cart'] as $id => $quantity) {

$sql=$pdo->prepare('SELECT price FROM products WHERE id=?');
$sql->execute([$id]);
$item=$sql->fetch();

$total_price += $item['price'] * $quantity;

}
?>

  <div class="cart-summary">  
    <p class="cart-count">
    現在商品 <?= array_sum($_SESSION['cart'] ?? []) ?>点
    </p>
    <p class="cart-total">
    ご注文合計：税込み
    <span>
      <?= number_format($total_price) ?>円
    </span>
    </p>
      <button class="purchase-btn">
      <a href="purchase-site.php">購入確定へ進む</a>
      </button>
  </div>

  <?php if(empty($_SESSION['cart'])): ?>

    <p class="cart-empty">
    商品がありません
    </p>

<?php else: ?>

<?php
foreach ($_SESSION['cart'] as $id => $quantity) {

$sql=$pdo->prepare('SELECT * FROM products WHERE id=?');
$sql->execute([$id]);
$item=$sql->fetch();

$item['quantity']=$quantity;
?>

<div class="cart-List">
  <div class="product-image product-<?= $item['id'] ?>"></div>
    <div class="cart-product-info">
      <h4 class="d-product-name">
      <?= htmlspecialchars($item['name']) ?>
      </h4>
      <p class="cart-product-price">
      税込 ￥<?= number_format($item['price']) ?>
      </p>
      <div class="cart-product-quantity">
        <form method="post">
          <input type="hidden" name="update_id" value="<?= $item['id'] ?>">
            <div class="quantity-row">
                <label class="cart-amount-label">数量</label>
                <input
                type="number"
                name="update_quantity"
                class="cart-quantity-box"
                value="<?= $item['quantity'] ?>"
                min="1"
                >
                <label class="cart-quantity-label">個</label>
            </div>
          <button class="recalculation-btn">
          再計算
          </button>
        </form>
      <form method="post">
        <input type="hidden" name="delete_id" value="<?= $item['id'] ?>">
        <button class="delete-btn">
        削除する
        </button>
      </form>
      </div>
    </div>
</div>

<?php } ?>
  <div class="cart-summary">  
    <p class="cart-count">
    現在商品 <?= array_sum($_SESSION['cart'] ?? []) ?>点
    </p>
    <p class="cart-total">
      ご注文合計：税込み
      <span>
        <?= number_format($total_price) ?>円
      </span>
    </p>
    
      <a href="purchase-site.php" class="purchase-btn">購入確定へ進む</a>
  </div>
<?php endif; ?>

<?php require 'includes/footer.php'; ?>

