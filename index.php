 <?php require 'includes/header.php'; ?>
  <title>C.C.Donuts</title>
    
<?php
// すべてのエラーを報告する
error_reporting(E_ALL);
// 画面にエラーを表示させる
ini_set('display_errors', "On");
 if (session_status() === PHP_SESSION_NONE) {
     session_start();
} ?>

<?php
// 1. データベースに接続
$pdo = new PDO('mysql:host=localhost;dbname=tailgan449_ccdonuts20260311;charset=utf8', 'tailgan449_ccdonuts20260311', 'PWdonuts260311');

// 2. ランキング用の商品を取得（例えば売上順など）
// sales_countが多い順（DESC）に上から6つ取得する
$sql = $pdo->query('SELECT * FROM products ORDER BY sales_count DESC LIMIT 6');
$ranking_items = $sql->fetchAll();
?>

    <main class="site-main">
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
        <!-- ヒーロー画像 -->
         <div class="top-hero-image"></div>
         <!-- お知らせコンテンツ -->
         <div class="top-NotificationContent">
             <div class="top-item">
                 <div class="top-NewItem">
                    <p class="top-NewItemTag">新商品</p>
                     <p>サマーシトラス</p>
                 </div>
                 <div class="top-ALifeWithDonuts">
                     <p>ドーナツのある生活</p>
                 </div>
             </div>
             <div class="top-ItemList">
                 <p>商品一覧</p>
             </div>
         </div>
        <!-- お店の紹介コンテンツ -->
          <div class="top-IntroductionStore">
             <p class="philosophy-en">Philosophy</p>
             <p class="philosophy-ja">私たちの信念</p>
             <p class="concept-en">"Creating Connections"</p>
             <p class="concept-ja">「ドーナツでつながる」</p>
         </div>
        <!-- 人気ランキングコンテンツ -->
         <section class="ranking">
            <h2>今、選ばれているドーナツ</h2>
                <!-- 人気ランキング1位 -->
            <ul class="ranking-list">
                    <?php 
                    $ranking_img_classes = [
                        'img_donuts',            // 1位の画像用クラス
                        'img_chocolatedaylight',  // 2位の画像用クラス
                        'img_caramelcream',      // 3位の画像用クラス
                        'img_plainclassic',      // 4位の画像用クラス
                        'img_SummerCitrus',      // 5位の画像用クラス
                        'img_StrawberryCrush'     // 6位の画像用クラス
                    ];

                    $rank = 1; // 順位を数える変数
                    if (!empty($ranking_items)):
                        foreach ($ranking_items as $item): 
                            // 商品のIDによって、適用するクラス名を決める（条件分岐）
                            // ループの中で12種類判定する
                            $display_class = '';

                            if ($item['id'] == 1) { 
                                $display_class = 'img_donuts'; 
                            } elseif ($item['id'] == 2) { 
                                $display_class = 'img_chocolatedaylight'; 
                            } elseif ($item['id'] == 3) { 
                                $display_class = 'img_caramelcream'; 
                            } elseif ($item['id'] == 4) { 
                                $display_class = 'img_plainclassic'; 
                            } elseif ($item['id'] == 5) { 
                                $display_class = 'img_SummerCitrus'; 
                            } elseif ($item['id'] == 6) { 
                                $display_class = 'img_StrawberryCrush'; 
                            } elseif ($item['id'] == 7) { 
                                $display_class = 'img_fruit12'; 
                            } elseif ($item['id'] == 8) { 
                                $display_class = 'img_14pieces'; 
                            } elseif ($item['id'] == 9) { 
                                $display_class = 'img_BestSelectBox'; 
                            } elseif ($item['id'] == 10) { 
                                $display_class = 'img_ChocolateCrushbox'; 
                            } elseif ($item['id'] == 11) { 
                                $display_class = 'img_CreamBox4pieces'; 
                            } elseif ($item['id'] == 12) { 
                                $display_class = 'img_CreamBox9pieces'; 
                            }
                            ?>
                    <li class="ranking-item">
                        <span class="rank"><?php echo $rank; ?>位</span>
                        <a href="product_detail.php?id=<?php echo $item['id']; ?>" class="product">
                            <div class="product-index-image <?php echo $display_class; ?>"></div>

                            <p class="product-name"><?php echo htmlspecialchars($item['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="product-price">税込 ￥<?php echo number_format($item['price'] ?? 0); ?></p>
                            <button class="add-cart">カートに入れる</button>
                        </a>
                    </li>
            <?php 
                $rank++; 
                endforeach; 
            endif;
            ?>
        </ul>
         </section>
    
 <?php require 'includes/footer.php'; ?>