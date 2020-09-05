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
  <title>テストECサイト</title>
</head>
<body>
  @include('header')

  <div class="h1Box"><h1>商品カテゴリ</h1></div>


  <div class="main">
    <div class="breadCrumb">
      <a href="/">TOPページ</a> ＞ 商品カテゴリページ
    </div>

    <div class="itemList">


      @foreach($items as $item)
        {{--商品--}}
        <section class="ibParent">
          {{--左ブロック(商品画像)--}}
          <div class="left">
            <img src="{{ asset('/images/sample.jpg') }}">
          </div>
          {{--中央ブロック--}}
          <div class="center">
            <h2>{{$item->name}}</h2>
            <div class="text">{{$item->description}}</div>
          </div>
          {{--右ブロック--}}
          <div class="right">
            <div class="price">&yen; {{ number_format($item->price) }}（税込）</div>
            <a href="">詳細を見る</a>
          </div>
        </section>
      @endforeach



    </div>
  </div>



</body>
</html>
