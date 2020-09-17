<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/admin/order_list.css') }}" rel="stylesheet">
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
            <td colspan="2">
              ステータス
              <label for="status1"><input type="checkbox" name="status" id="status1">新規受付</label>
              <label for="status2"><input type="checkbox" name="status" id="status2">入金待ち</label>
              <label for="status3"><input type="checkbox" name="status" id="status3">入金済み</label>
              <label for="status4"><input type="checkbox" name="status" id="status4">発送済み</label>
              <label for="status5"><input type="checkbox" name="status" id="status5">完了</label>
              <label for="status6"><input type="checkbox" name="status" id="status6">入金待ち</label>
            </td>
          </tr>

          <tr>
            <td>
              注文ID<br>
              <input type="text" name="id">
            </td>
          </tr>
          <tr>
            <td class="leftCell">
              お名前<br>
              <input type="text" name="name">
            </td>
            <td>
              お名前（フリガナ）<br>
              <input type="text" name="name_kana">
            </td>
          </tr>
          <tr>
            <td class="leftCell">
              メールアドレス<br>
              <input type="text" name="email">
            </td>
            <td>
              電話番号<br>
              <input type="text" name="tel">
            </td>
          </tr>
          <tr>
            <td colspan="2" class="date">
              受注日<br>
              <input type="text" name="id" class="from">～<input type="text" name="id" class="to">
            </td>
          </tr>
        </table>

        <div class="clearBtnBox">
          <a>検索条件をクリア</a>
        </div>
      </div>

      <a class="searchBtn">検索する</a>

      <div class="orderList">
        <div>182件が該当</div>
        <table>
          <tr>
            <th>受注日</th>
            <th>注文ID</th>
            <th>お名前</th>
            <th>購入金額</th>
            <th>ステータス</th>
            <th></th>
          </tr>

          <tr>
            <td>09/10</td>
            <td>120</td>
            <td>阪本周作</td>
            <td>12,500</td>
            <td>新規受付</td>
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
