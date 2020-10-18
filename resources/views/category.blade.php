<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/category.css') }}" rel="stylesheet">
  <title>{{ $category->name }}の一覧｜Laravel サンプルECサイト</title>
</head>
<body>
  @include('header')

  <div class="main">
    <div class="breadCrumb">
      <a href="/">TOPページ</a> ＞ {{ $category->name }}の一覧
    </div>

    <h1>{{ $category->name }}の一覧</h1>

    <!-- 商品一覧 -->
    <div class="itemList">
      @foreach($items as $item)
        {{--商品--}}
        <section class="ibParent">
          {{--左ブロック(商品画像)--}}
          <div class="left">
            <a href="/products/detail/{{$item->id}}"><img src="{{ asset('/images/sample.jpg') }}" alt="{{$item->name}}"></a>
          </div>
          {{--中央ブロック--}}
          <div class="center">
            <h2><a href="/products/detail/{{$item->id}}">{{$item->name}}</a></h2>
            <div class="text">{{$item->description}}</div>
          </div>
          {{--右ブロック--}}
          <div class="right">
            <div class="price">&yen; {{ number_format($item->price) }}（税抜）</div>
            <a href="/products/detail/{{$item->id}}">詳細を見る</a>
          </div>
        </section>
      @endforeach
    </div>
  </div>
</body>
</html>
