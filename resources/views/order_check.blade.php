<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/order.css') }}" rel="stylesheet">
  <title>ご注文内容確認｜Laravel サンプルECサイト</title>
</head>
<body>
  @include('header')

  <div class="main">
    <div class="breadCrumb">
      <a href="/">TOPページ</a> ＞ <h1>ご注文内容確認</h1>
    </div>

    <section>
      <h2 class="topText">お客様情報</h2>

      <!-- 進捗イメージ -->
      <ul class="flow ibParent">
        <li>
          <span>1</span>
          <span class="text">カート</span>
        </li>
        <li>
          <span>2</span>
          <span class="text">お客様情報</span>
        </li>
        <li class="active">
          <span>3</span>
          <span class="text">内容確認</span>
        </li>
        <li>
          <span>4</span>
          <span class="text">完了</span>
        </li>
      </ul>

      <form class="orderForm">
        <table>
          <tr>
            <th>お名前</th>
            <td class="name">
              {{$formParams['name']}}
            </td>
          </tr>
          <tr>
            <th>お名前（フリガナ）</th>
            <td>
              {{$formParams['name_kana']}}
            </td>
          </tr>

          <tr>
            <th>郵便番号</th>
            <td>
              〒{{$formParams['zip']}}
            </td>
          </tr>

          <tr>
            <th>都道府県</th>
            <td>
              @php
                $prefArr = config('pref');
              @endphp
              {{$prefArr[$formParams['pref']]}}
            </td>
          </tr>

          <tr>
            <th>市区郡町村・番地</th>
            <td>
              {{$formParams['address1']}}
            </td>
          </tr>

          <tr>
            <th>建物名（任意）</th>
            <td>
              {{$formParams['address2']}}
            </td>
          </tr>

          <tr>
            <th>電話番号</th>
            <td>
              {{$formParams['tel']}}
            </td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td>
              {{$formParams['email']}}
            </td>
          </tr>
          <tr>
            <th>備考欄</th>
            <td>
              {{$formParams['memo']}}
            </td>
          </tr>
        </table>
      </form>
    </section>


    <section>
      <h2 class="topText">商品リスト</h2>
        <div class="itemList">
          @php
            $totalCost = 0;
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
                </div>

              </section>

              @php
                $totalCost += $items[$val['itemId']]['price'] * $val['num'];
              @endphp
            @endforeach
          @endif


        </div>

        @if (isset($cartItems) && 0 < count($cartItems))
          <div class="totalPrice">小計：{{ number_format($totalCost) }}円</div>
        @endif
    </section>

    <form method="post" action="/order/comp" class="orderForm">
      <button class="inputBtn" name="submit" value="send">注文する</button>
      <button class="backBtn" name="submit" value="back">戻る</button>
      {{ csrf_field() }}
      <input name="name" value="{{$formParams['name']}}" type="hidden">
      <input name="name_kana" value="{{$formParams['name_kana']}}" type="hidden">
      <input name="zip" value="{{$formParams['zip']}}" type="hidden">
      <input name="pref" value="{{$formParams['pref']}}" type="hidden">
      <input name="address1" value="{{$formParams['address1']}}" type="hidden">
      <input name="address2" value="{{$formParams['address2']}}" type="hidden">
      <input name="tel" value="{{$formParams['tel']}}" type="hidden">
      <input name="email" value="{{$formParams['email']}}" type="hidden">
      <input name="email2" value="{{$formParams['email2']}}" type="hidden">
      <input name="memo" value="{{$formParams['memo']}}" type="hidden">
    </form>

  </div>
</body>
</html>
