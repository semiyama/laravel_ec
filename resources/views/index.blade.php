<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/index.css') }}" rel="stylesheet">
  <title>テストECサイト</title>
</head>
<body>
  @include('header')

  <div class="h1Box"><h1>ECサイトTOP</h1></div>

  <div class="main">
    {{-- カテゴリから探す --}}
    <section class="category">
      <h2>カテゴリから探す</h2>
      <div class="ibParent">
        <a href="/category/1" class="categoryBtn"><img src="{{ asset('/images/banner_book.jpg') }}"></a>
        <a href="/category/2" class="categoryBtn"><img src="{{ asset('/images/banner_cd.jpg') }}"></a>
        <a href="/category/3" class="categoryBtn"><img src="{{ asset('/images/banner_bluray.jpg') }}"></a>
      </div>
    </section>

    {{-- 新着商品 --}}
    <section class="newItem">
      <h2>新着商品</h2>
      <div class="ibParent itemBtnBox">
        @foreach($items as $item)
          <a href="" class="itemBtn">
            <img src="{{ asset('/images/sample.jpg') }}">
            <div>
              {{ $item->name }} ({{ $item->item_category->name }})
            </div>
          </a>
        @endforeach
      </div>
    </section>
  </div>
</body>
</html>
