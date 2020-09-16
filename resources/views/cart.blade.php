<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/cart.css') }}" rel="stylesheet">
  <title>カート｜Laravel サンプルECサイト</title>
</head>
<body>
  @include('header')

  <div class="main">
    <div class="breadCrumb">
      <a href="/">TOPページ</a> ＞ <h1>ショッピングカート</h1>
    </div>

    <h2 class="topText">ショッピングカート</h2>

    <!-- 進捗イメージ -->
    <ul class="flow ibParent">
      <li class="active">
        <span>1</span>
        <span class="text">カート</span>
      </li>
      <li>
        <span>2</span>
        <span class="text">お客様情報</span>
      </li>
      <li>
        <span>3</span>
        <span class="text">内容確認</span>
      </li>
      <li>
        <span>4</span>
        <span class="text">完了</span>
      </li>
    </ul>

    <div class="itemList">
      <section class="ibParent">

        <div class="left">
          <a href="/products/detail/1"><img src="http://127.0.0.1:8000/images/sample.jpg" alt="遠い太鼓（村上春樹）"></a>
        </div>

        <div class="right">
          <h3><a href="/products/detail/1">遠い太鼓（村上春樹）</a></h3>
          <div class="price">6,600円</div>
          <span class="delete">削除</span>
        </div>

      </section>
    </div>

    <div class="totalPrice">小計：13,200円</div>

    <form>
      <button class="inputBtn">レジに進む</button>
    </form>

  </div>
</body>
</html>
