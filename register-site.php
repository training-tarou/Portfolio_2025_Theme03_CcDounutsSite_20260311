
  <?php require 'includes/header.php'; ?> 
 <title>C.C.Donuts|register-input会員登録</title>
    <div id="product-list-nav">
        <nav class="breadcrumbNav" aria-label="パンくずリスト">
            <ul class="breadcrumbList">
                <li class="breadcrumbItem"><a href="index.php">top</a></li>
                <li class="breadcrumbItem"><a href="login-site.php">ログイン</a></li>
                <li class="breadcrumbItem"><a href="register-site.php">会員登録</a></li>
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
            <div class="title">会員登録</div>
        </div>
        <form action="register-input.php" method="post" class="register-form">
            <!--名前-->
            <div class="register-form-item">
                <label>お名前<span class="required">(必須)</span></label>
                    <input type="text" name="name" placeholder="(例)ドーナツ太郎" required>
            </div>
            <!--フリガナ-->
            <div class="register-form-item">
                <label>名前フリガナ<span class="required">(必須)</span></label>
                <input type="text" name="name_kana" placeholder="(例)ドーナツタロウ" required>
            </div>
            <!--郵便番号-->
            <div class="register-form-item">
                <label>郵便番号<span class="required">(必須)</span></label>
                <div class="postal">
                    <input type="text" name="zip1" placeholder="(例)123" maxlength="3">
                    <span>-</span>
                    <input type="text" name="zip2" placeholder="(例)4567" maxlength="4">
                </div>
            </div>
            <!--住所-->
            <div class="register-form-item">
                <label>住所<span class="required">(必須)</span></label>
                <input type="text" name="address" placeholder="(例)千葉県〇〇市中央1-1-1" required>
            </div>
            <!-- メール -->
            <div class="register-form-item">
                <label>メールアドレス<span class="required">(必須)</span></label>
                <input type="email" name="email" placeholder="(例)123@gmail.com" required>
            </div>
            <!-- メール確認 -->
            <div class="register-form-item">
                <label>メールアドレス（確認用）<span class="required">(必須)</span></label>
                <input type="email" name="email_confirm" placeholder="(例)123@gmail.com" required>
            </div>
            <!-- パスワード -->
            <div class="register-form-item">
                <label>パスワード<span class="required" placeholder="(例)123@gmail.com" >(必須)</span></label>
                <p class="note">
                    半角英数字8文字以上20文字以内で入力してください。※記号の使用はできません。
                </p>
                <input type="password" name="password" minlength="8" maxlength="20" required>  
            </div>
            <!-- パスワード確認 -->
            <div class="register-form-item">
                <label>パスワード（確認用）<span class="required">(必須)</span></label>
                <input type="password" name="password_confirm" required>
            </div>
            <!-- 送信 -->
            <input type="submit" class="submit-btn" value="入力確認する"><a href="register-complete.php"></a>
        </form>
    </section>
    
<?php require 'includes/footer.php'; ?>