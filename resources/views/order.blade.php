<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <meta name="robots" content="noindex">
  <link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/order.css') }}" rel="stylesheet">
  <title>Laravel サンプルECサイト</title>
</head>
<body>
  @include('header')

  <div class="main">
    <div class="breadCrumb">
      <a href="/">TOPページ</a> ＞ <h1>ご注文フォーム</h1>
    </div>

    <h2 class="topText">ご注文フォーム</h2>

    <!-- 進捗イメージ -->
    <ul class="flow ibParent">
      <li>
        <span>1</span>
        <span class="text">カート</span>
      </li>
      <li class="active">
        <span>2</span>
        <span class="text">お客様情報</span>
      </li>
      <li>
        <span>3</span>
        <span class="text">内容確認</span>
      </li>
      <li>
        <span>4</span>
        <span class="text">完了</span>
      </li>
    </ul>

    <form class="orderForm">
      <table>
        <tr>
          <th>お名前</th>
          <td class="name">
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
          <td>
            〒<input type="text" name="zip" class="zip"><br><br>
            <select name="pref">
              <option>選択してください</option>
            </select>
            <br><br>
            <input type="text" name="address1"><br><br>
            <input type="text" name="address2">
          </td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td>
            <input type="text" name="tel">
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            <input type="text" name="email"><br><br>
            <input type="text" name="email2">
          </td>
        </tr>
      </table>
    </form>

    <form>
      <button class="inputBtn">次へ</button>
      <button class="backBtn">戻る</button>
    </form>

  </div>
</body>
</html>
