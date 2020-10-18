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
      @php
        $totalCost = 0;
        $totalTax = 0;
      @endphp

      @if (!isset($cartItems) || count($cartItems) == 0)
        <div class="noItem">カートに商品がありません。</div>
      @else
        @foreach ($cartItems as $k => $val)
          <section class="ibParent">

            <div class="left">
              <a href="/products/detail/1"><img src="/images/sample.jpg" alt="{{ $items[$val['itemId']]['name'] }}"></a>
            </div>

            <div class="right">
              <h3><a href="/products/detail/1">{{ $items[$val['itemId']]['name'] }}</a></h3>
              <div class="price">{{ $items[$val['itemId']]['price'] }}円</div>
              <div class="num">{{ $val['num'] }}個</div>
              <form method="post" action="/cart/delete">
                <button class="delete">削除</button>
                <input type="hidden" name="timeStamp" value="{{ $val['timeStamp'] }}">
                {{ csrf_field() }}
              </form>
            </div>

          </section>

          @php
            $totalCost += $items[$val['itemId']]['price'] * $val['num'];
            $totalTax += floor(($items[$val['itemId']]['price'] * $val['num']) * config('const.TAX'));
          @endphp
        @endforeach
      @endif


    </div>

    @if (isset($cartItems) && 0 < count($cartItems))
      <div class="totalPrice">
        小計：{{ number_format($totalCost) }}円<br>
        消費税：{{ number_format($totalTax) }}円<br>
        合計：{{ number_format($totalCost + $totalTax) }}円
      </div>

      <a href="/order"><button class="inputBtn">レジに進む</button></a>
    @endif

  </div>
</body>
</html>
