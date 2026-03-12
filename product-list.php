  <?php require 'includes/header.php'; ?> 

     <title>C.C.Donuts|itemlist商品一覧</title>

     <div id="product-list-nav">
         <nav class="breadcrumbNav" aria-label="パンくずリスト">
             <ul class="breadcrumbList">
                <li class="breadcrumbItem"><a href="index.php">top</a></li>
                <li class="breadcrumbItem"><a href="product-list.php">商品一覧</a></li>
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
    </div>
    <main class="Main-product-list">
        <!-- 商品一覧ページ -->
        <section class="product-list-section">
            <h3>商品一覧</h3>
        <div class="product-list-menu">メインメニュー</div>
        <ul class="product-list">
        <!-- 商品1 -->
        <li class="product-item">
            <a href="product_detail.php?id=1" class="product-link">
                <div class="product-image"></div>
                <p class="product-name">CCドーナツ 当店オリジナル（5個入り）</p>
                <p class="product-price">税込 ￥1,500</p>
            </a>
                <button class="add-cart">カートに入れる</button>
        </li>

        <!-- 商品2 -->
        <li class="product-item">
            <a href="product_detail.php?id=2" class="product-link">
                <div class="product-image" ></div>
                <p class="product-name">フルーツドーナツセット（12個入り）</p>
                <p class="product-price">税込 ￥3,500</p>
            </a>
                <button class="add-cart">カートに入れる</button>
        </li>

        <!-- 商品3 -->
        <li class="product-item">
            <a href="product_detail.php?id=3" class="product-link">
                <div class="product-image"></div>
                <p class="product-name">フルーツドーナツセット（14個入り）</p>
                <p class="product-price">税込 ￥4,000</p>
            </a>
                <button class="add-cart">カートに入れる</button>
        </li>

        <!-- 商品4 -->
        <li class="product-item">
           <a href="product_detail.php?id=4" class="product-link">
                <div class="product-image"></div>
                <p class="product-name">チョコレートデライト（5個入り）</p>
                <p class="product-price">税込 ￥1,600</p>
            </a>
               <button class="add-cart">カートに入れる</button>
        </li>

        <!-- 商品5 -->
        <li class="product-item">
            <a href="product_detail.php?id=5" class="product-link">
                <div class="product-image"></div>
                <p class="product-name">ベストセレクションボックス（4個入り）</p>
                <p class="product-price">税込 ￥1,200</p>
            </a>
                <button class="add-cart">カートに入れる</button>
        </li>

        <!-- 商品6 -->
        <li class="product-item">
            <a href="product_detail.php?id=6" class="product-link">
                <div class="product-image" ></div>
                <p class="product-name">ストロベリークラッシュ（5個入り）</p>
                <p class="product-price">税込 ￥1,800</p>
            </a>
                <button class="add-cart">カートに入れる</button>
        </li>
        </ul>
       </section>
    </main>
   <sub class="sub-product-list-set">
       <section class="product-list-set-section">
            <div class="product-list-set-menu">バラエティセット</div>
        <ul class="product-list-set">
        <!-- 商品7 -->
        <li class="product-item">
            <a href="product_detail.php?id=7" class="product-link">
                <div class="product-image"></div>
                <p class="product-name">フルーツドーナツセット（12個入り）</p>
                <p class="product-price">税込 ￥3,500</p>
            </a>
                <button class="add-cart">カートに入れる</button>
        </li>

        <!-- 商品8 -->
         <li class="product-item">
            <a href="product_detail.php?id=8" class="product-link">
                <div class="product-image" ></div>
                <p class="product-name">フルーツドーナツセット（14個入り）</p>
                <p class="product-price">税込 ￥4,000</p>
            </a>
                <button class="add-cart">カートに入れる</button>
        </li>

        <!-- 商品9 -->
         <li class="product-item">
                <a href="product_detail.php?id=9" class="product-link">
                <div class="product-image"></div>
                <p class="product-name">ベストセレクションボックス（4個入り）</p>
                <p class="product-price">税込 ￥1,200</p>
            </a>
               <button class="add-cart">カートに入れる</button>
        </li>

        <!-- 商品10 -->
         <li class="product-item">
            <a href="product_detail.php?id=10" class="product-link">
                <div class="product-image"></div>
                <p class="product-name">チョコクラッシュボックス（7個入り）</p>
                <p class="product-price">税込 ￥2,400</p>
           </a>
                <button class="add-cart">カートに入れる</button>
        </li>
        
        <!-- 商品11 -->
         <li class="product-item">
            <a href="product_detail.php?id=11" class="product-link">
                <div class="product-image"></div>
                <p class="product-name">クリームボックス（4 個入り）</p>
                <p class="product-price">税込 ￥1,400</p>
            </a>
                <button class="add-cart">カートに入れる</button>
        </li>

          <!-- 商品12 -->
         <li class="product-item">
            <a href="product_detail.php?id=12" class="product-link">
                <div class="product-image"></div>
                <p class="product-name">クリームボックス（9 個入り）</p>
                <p class="product-price">税込 ￥2,800</p>
            </a>
                <button class="add-cart">カートに入れる</button>
         </li>
        </ul>       
      </section>
   </sub>
<?php require 'includes/footer.php'; ?>


