'use strict';

// ページの中身が全部読み込まれたら実行する
document.addEventListener('DOMContentLoaded', function() {

  // ハンバーガーメニューのボタンを取得A
  const hamburger = document.getElementById('hamburger');

  // ドロワーメニュー本体を取得
  const drawer = document.getElementById('drawer');

  // 背景の暗いオーバーレイを取得
  const overlay = document.getElementById('drawerOverlay');

  // ドロワー内の閉じるボタンを取得
  const closeBtn = document.getElementById('closeNav');

  // もしどれかが存在しなかったら処理を止める
  if (!hamburger || !drawer || !overlay || !closeBtn) return;

  // 1. ハンバーガーボタンを押したとき
  hamburger.addEventListener('click', function() {
    drawer.classList.add('is-open');   // ドロワーを表示
    overlay.classList.add('is-open');  // 背景を暗くする
  });

  // 2. ドロワーの閉じるボタンを押したとき
  closeBtn.addEventListener('click', function() {
    drawer.classList.remove('is-open');   // ドロワーを隠す
    overlay.classList.remove('is-open');  // 背景を元に戻す
  });

  // 3. 背景のオーバーレイをクリックしたとき
  overlay.addEventListener('click', function() {
    drawer.classList.remove('is-open');   // ドロワーを隠す
    overlay.classList.remove('is-open');  // 背景を元に戻す
  });

  // 4. キーボードの「ESC」キーを押したとき
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') { // ESCキーかチェック
      drawer.classList.remove('is-open');   // ドロワーを隠す
      overlay.classList.remove('is-open');  // 背景を元に戻す
    }
  });

});