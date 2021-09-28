<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>index</title>
</head>

<body>
    <h1>顧客一覧画面</h1>
    <table>
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>
        <tr>
            <th>{{ $customer->id }}</th>
            <th>{{ $customer->name }}</th>
            <th>{{ $customer->email }}</th>
            <th>{{ $customer->postaddress }}</th>
            <th>{{ $customer->address }}</th>
            <th>{{ $customer->telephone }}</th>
        </tr>
    </table>

    <button type="button" onclick="location.href='{{ route('customers.edit', $customer) }}'">編集する</button>
    <form action="/customers/{{ $customer->id }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="削除する" onclick="if(!confirm('本当に削除しますか？')){return false};">
    </form>
    <div class='blockButton'>
        <button type="button" onclick="location.href='{{ route('customers.index') }}'">一覧に戻る</button>
    </div>
</body>

</html>
