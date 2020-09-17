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
            <th>お名前</th>
            <td>
              <input type="text" name="name">
            </td>
          </tr>
          <tr>
            <th>お名前（フリガナ）</th>
            <td>
              <input type="text" name="name_kana">
            </td>
          </tr>
          <tr>
            <th>住所</th>
            <td class="address">
              <div>
                〒<input type="text" name="zip">
              </div>
              <div>
                <select>
                  <option>選択して下さい</option>
                </select>
              </div>
              <div>
                <input type="text" name="address1">
              </div>
              <div>
                <input type="text" name="address2">
              </div>
            </td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td>
              <input type="text" name="email">
            </td>
          </tr>
          <tr>
            <th>電話番号</th>
            <td>
              <input type="text" name="tel">
            </td>
          </tr>
          <tr>
            <th>管理メモ</th>
            <td class="memo">
              <textarea></textarea>
            </td>
          </tr>
        </table>
      </section>

      <section class="orderItems">
        <h2>注文商品</h2>
        <div class="addBtnBox">
          <button>商品の追加</button>
        </div>

        <table>
          <tr>
            <td class="itemName">ドラゴンボール3巻</td>
            <td>
              単価<input type="text" name="item_price">
              個数<input type="text" name="num">
              <a>削除</a>
            </td>
            <td class="allPrice">小計：1000円</td>
          </tr>
        </table>

        <div class="bottom">
          <div class="allPrice">小計：1000円</div>
          <div class="delivPrice">送料<input type="text" name="deliv_price"></div>
          <div class="totalPrice">合計：15000円</div>
        </div>

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
