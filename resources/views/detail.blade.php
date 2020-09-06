<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/detail.css') }}" rel="stylesheet">
  <title>商品カテゴリページ｜Laravel サンプルECサイト</title>
</head>
<body>
  @include('header')

  <div class="main">
    <div class="breadCrumb">
      <a href="/">TOPページ</a> ＞ <h1>{{ $item->name }}</h1>
    </div>

    <div class="main">
      <div class="item ibParent">
        <!-- 左ブロック -->
        <div class="left">
          <img src="{{ asset('/images/sample.jpg') }}" alt="{{$item->name}}">
        </div>

        <!-- 右ブロック -->
        <div class="right">
          <h2>{{$item->name}}</h2>
          <p class="description">{{$item->description}}</p>
          <div class="price">&yen; {{ number_format($item->price) }}（税込）</div>
          <form action="/cart/add" method="post">
            {{ csrf_field() }}
            <button>カゴに入れる</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
