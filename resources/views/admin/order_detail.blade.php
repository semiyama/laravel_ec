<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/admin/login.css') }}" rel="stylesheet">
  <title>ログイン｜Laravel サンプルECサイト</title>
</head>
<body>
  <header>Laravel ECサイト サンプル管理画面</header>

  <div class="main">
    <form>
      <input type="text">
      <input type="text">
      <button>ログイン</button>
    </form>
  </div>
</body>
</html>
