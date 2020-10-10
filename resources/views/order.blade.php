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

    <form method="post" action="/order/check" class="orderForm">
      <table>
        <tr>
          <th>お名前</th>
          <td class="name">
            <input type="text" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
              <span class="error">{{ $errors->first('name') }}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>お名前（フリガナ）</th>
          <td>
            <input type="text" name="name_kana" value="{{ old('name_kana') }}">
            @if ($errors->has('name_kana'))
              <span class="error">{{ $errors->first('name_kana') }}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>郵便番号</th>
          <td>
            〒<input type="text" name="zip" class="zip" value="{{ old('zip') }}">
            @if ($errors->has('zip'))
              <span class="error">{{ $errors->first('zip') }}</span>
            @endif
          </td>
        </tr>

        <tr>
          <th>都道府県</th>
          <td>
            <select name="pref">
              <option value="">選択してください</option>
              @foreach(config('pref') as $k => $val)
                  <option value="{{ $k }}" @if (old('pref') == $k) selected @endif>{{ $val }}</option>
              @endforeach
            </select>
            @if ($errors->has('pref'))
              <span class="error">{{ $errors->first('pref') }}</span>
            @endif
          </td>
        </tr>

        <tr>
          <th>市区郡町村・番地</th>
          <td>
            <input type="text" name="address1" value="{{ old('address1') }}">
            @if ($errors->has('address1'))
              <span class="error">{{ $errors->first('address1') }}</span>
            @endif
          </td>
        </tr>

        <tr>
          <th>建物名（任意）</th>
          <td>
            <input type="text" name="address2" value="{{ old('address2') }}">
          </td>
        </tr>

        <tr>
          <th>電話番号</th>
          <td>
            <input type="text" name="tel" value="{{ old('tel') }}">
            @if ($errors->has('tel'))
              <span class="error">{{ $errors->first('tel') }}</span>
            @endif
          </td>
        </tr>

        <tr>
          <th>メールアドレス</th>
          <td>
            <input type="text" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
              <span class="error">{{ $errors->first('email') }}</span>
            @endif
            <br><br>
            <input type="text" name="email2" value="{{ old('email2') }}">
            @if ($errors->has('email2'))
              <span class="error">{{ $errors->first('email2') }}</span>
            @endif
          </td>
        </tr>

        <tr>
          <th>備考欄</th>
          <td>
            <textarea name="memo">{{ old('memo') }}</textarea>
          </td>
        </tr>
      </table>

      <button class="inputBtn">次へ</button>
      <a href="/cart"><button type="button" class="backBtn">戻る</button></a>
      {{ csrf_field() }}
    </form>

  </div>
</body>
</html>
