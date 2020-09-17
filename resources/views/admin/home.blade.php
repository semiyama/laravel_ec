<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/admin/home.css') }}" rel="stylesheet">
  <title>トップページ｜Laravel ECサイト サンプル管理画面</title>
</head>
<body>
  <header>Laravel ECサイト サンプル管理画面</header>

  <div class="main">
    <h1>ホーム</h1>

    <div class="container">
      <section class="calc">
        <h2>受注状況</h2>
        <div>
          本日の注文数：2<br>
          今月の注文数：12
        </div>
      </section>
    </div>
  </div>

  <!-- 左サイドバー -->
  <div id="side">
    <ul>
      <li><a href="">ホーム</a></li>
      <li><a href="">商品管理</a></li>
      <li><a href="">受注管理</a></li>
    </ul>
  </div>

</body>
</html>
