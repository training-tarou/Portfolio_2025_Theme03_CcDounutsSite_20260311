 <?php
require 'includes/header.php'; 

//1. URLの id を取得
//product_detail.php?id=1が商品一覧からこういうＵＲＬが来る前提です
$id = isset($_GET['id']) ? $_GET['id'] : 1;
?>

<?php
// 2.データベース接続
$pdo = new PDO('mysql:host=localhost;dbname=ccdonuts;charset=utf8', 'root', '');
?>

<?php
// 3.SQLで商品取得 
$sql = $pdo->prepare('SELECT * FROM products WHERE id=?');
$sql->execute([$id]);

$product = $sql->fetch();
//これで products テーブルの1件のデータが取得できます.
?>
  <title>C.C.Donuts|product_detail商品詳細</title>
    <div id="product-list-nav">
        <nav class="breadcrumbNav" aria-label="パンくずリスト">
            <ul class="breadcrumbList">
                <li class="breadcrumbItem"><a href="index.php">top</a></li>
                <li class="breadcrumbItem"><a href="product-list.php">商品一覧</a></li>
                <li class="breadcrumbItem"><a href="product_detail.php?id=<?php echo $id; ?>"><?php echo $product['name']; ?></a></li>
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
    <section class="detail-section">

        <div class="product-details">

            <!-- 商品画像 -->
            <div class="product-detail-image product-<?php echo $id; ?>"></div>

            <!-- 商品情報 -->
            <div class="detail-product-info">
                <h4 class="d-product-name">
                    <?php echo $product['name']; ?>
                </h4>
                <p class="d-product-description">
                    <?php echo $product['introduction']; ?>
                </p>
                <p class="d-product-price">
                    税込 ￥<?php echo number_format($product['price']); ?>
                </p>

                <!-- 数量 & カート -->
                <div class="product-quantity">
                   <form action="cart.php" method="post" class="cart-form">
                    <!-- 商品ID -->
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <input type="number" id="quantity" class="quantity-box" name="quantity" value="1" min="1">
                        <label class="quantity-label" for="quantity">個</label>
                        <button type="submit" class="d-add-cart">カートに入れる</button>    
                    </form>

                    <!-- お気に入り -->
                    <button class="favorite-btn" aria-label="お気に入り">
                    ♡
                    </button>
                </div>
            </div>
        </div>
    </section>
 <?php require 'includes/footer.php'; ?>


