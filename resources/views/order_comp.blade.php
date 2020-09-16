]<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/order.css') }}" rel="stylesheet">
  <title>ご注文完了｜Laravel サンプルECサイト</title>
</head>
<body>
  @include('header')

  <div class="main">
    <div class="breadCrumb">
      <a href="/">TOPページ</a> ＞ <h1>ご注文完了</h1>
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
        <li>
          <span>3</span>
          <span class="text">内容確認</span>
        </li>
        <li class="active">
          <span>4</span>
          <span class="text">完了</span>
        </li>
      </ul>

      <div class="compMsg">
        ご注文が完了しました！<br>
        受注番号：125<br>
        担当者からご連絡させていただきますので、しばらくお待ちください。
      </div>


  </div>
</body>
</html>
