<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/admin/item_list.css') }}" rel="stylesheet">
  <title>受注一覧｜Laravel ECサイト サンプル管理画面</title>
</head>
<body>
  <header>Laravel ECサイト サンプル管理画面</header>

  <div class="main">
    <h1>受注一覧</h1>

    <div class="container">
      <div class="searchPanel">
        <table>
          <tr>
            <td>
              商品ID<br>
              <input type="text" name="id">
            </td>
            <td>
              カテゴリ<br>
              <select name="category">
                <option>選択して下さい</option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              商品名<br>
              <input type="text" name="name">
            </td>
          </tr>

        </table>

        <div class="clearBtnBox">
          <a>検索条件をクリア</a>
        </div>
      </div>

      <a class="searchBtn">検索する</a>

      {{-- アイテム一覧 --}}
      <div class="itemList">
        <div>
          <button>新規追加</button>
        </div>
        <table>
          <tr>
            <th>商品ID</th>
            <th>商品名</th>
            <th>カテゴリ</th>
            <th>単価</th>
            <th></th>
          </tr>

          <tr>
            <td>120</td>
            <td>阪本周作</td>
            <td>本</td>
            <td>120,000円</td>
            <td>編集</td>
          </tr>
        </table>
      </div>
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
