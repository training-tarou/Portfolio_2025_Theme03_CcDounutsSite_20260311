
 <?php require 'includes/header.php'; ?>  
<title>C.C.Donuts|credit-info-siteクレジット情報</title>
    <div id="product-list-nav">
        <nav class="breadcrumbNav" aria-label="パンくずリスト">
            <ul class="breadcrumbList">
                <li class="breadcrumbItem"><a href="index.php">Top</a></li>
                <li class="breadcrumbItem"><a href="cart.php">カート</a></li>
                <li class="breadcrumbItem"><a href="purchase-site.php">購入確認</a></li>
                <li class="breadcrumbItem">カード情報</a></li>
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
    <section class="site">
        <div class="register-item">
            <div class="credit-title">カード情報登録</div>
        </div>
        <form action="credit-info-input.php" method="post" class="register-form">
            <p class="credit-note">
                <span>※本ページはポートフォリオ用の模擬サイトです。</span>
                <span>実在のカード番号は入力しないでください。</span>
            </p>
            <!--名前-->
            <div class="form-item">
                <label>お名前<span class="required">(必須)</span></label>
                    <input type="text" name="name" placeholder="(例)ドーナツ太郎" required>
            </div>
            <!--カード番号-->
            <div class="form-item">
                <label>カード番号<span class="required">(必須)</span></label>
                <input type="text" 
                        name="card_number" 
                        placeholder="(例)1234567891234567"
                        inputmode="numeric"
                        pattern="\d{16}"
                        maxlength="16"
                        required>
            </div>
            <!--カード会社選択-->
            <div class="form-item">
                <label>カード会社<span class="required">(必須)</span></label>
                <label>
                    <input type="radio" name="card_type" value="JCB" required>
                        JCB
                    </label>
                <label>
                    <input type="radio" name="card_type" value="Visa">
                        Visa
                </label>
                <label>
                    <input type="radio" name="card_type" value="Mastercard">
                        Mastercard
                </label>
            </div>
            <!--住所-->
            <div class="form-item">
                <label>有効期限<span class="required">(必須)</span></label>
                <div class="expiry-item">
                    <select name="exp_year" required>
                        <option value="">選択</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select>
                    <span class="unit">年</span>
                </div>
                <div class="expiry-item">
                    <select name="exp_month" required>
                        <option value="">選択</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>                        
                    </select>
                <span class="unit">月</span>
                </div>
            </div>
            <!-- セキュリティコード -->
            <div class="form-item">
                <label>セキュリティコード<span class="required">(必須)</span></label>
                <input type="text"
                        name="security_code"
                        placeholder="123456"
                        inputmode="numeric"
                        pattern="\d{6}"
                        maxlength="6"
                        required>
            </div>
            <!-- 送信 -->
            <input type="submit" class="submit-btn" value="入力確認する">
        </form>
    </section>
 <?php require 'includes/footer.php'; ?>