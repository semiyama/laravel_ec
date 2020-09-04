<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device=width, initial-scale=1, shrink-fit=no'>
  <meta name='csrf-token' content='{{ csrf_token() }}'>
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <title>テストECサイト</title>
</head>
<body>
  <table>
  @foreach($items as $item)
  <tr>
    <td>{{ $item->name }}</td>
    <td>
      <a href="">
        {{ $item->name }}
      </a>
    </td>
    <td>カテゴリ番号{{ $item->category }}</td>
  </tr>
  @endforeach
</table>
</body>
</html>
