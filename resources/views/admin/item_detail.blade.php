<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/admin/order_detail.css') }}" rel="stylesheet">
  <title>受注詳細｜Laravel ECサイト サンプル管理画面</title>
</head>
<body>
  <header>Laravel ECサイト サンプル管理画面</header>

  <div class="main">
    <h1>受注詳細</h1>

    <div class="container">

      <section class="basic">
        <h2>基本情報</h2>

        <table>
          <tr>
            <th>注文ID 120</th>
          </tr>
          <tr>
            <th>商品名</th>
            <td>
              <input type="text" name="name">
            </td>
          </tr>
          <tr>
            <th>カテゴリ</th>
            <td class="address">
              <select>
                <option>選択して下さい</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>説明文</th>
            <td class="memo">
              <textarea></textarea>
            </td>
          </tr>
          <tr>
            <th>税別価格</th>
            <td>
              <input type="text" name="price">
            </td>
          </tr>
        </table>
      </section>

      <a class="updateBtn">更新</a>


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
