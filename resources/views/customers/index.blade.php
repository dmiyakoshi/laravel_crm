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
        @foreach ($customers as $customer)
            <tr>
                <th><a href="{{ route('customers.show', $customer) }}">{{ $customer->id }}</a></th>
                <th>{{ $customer->name }}</th>
                <th>{{ $customer->email }}</th>
                <th>{{ $customer->postaddress }}</th>
                <th>{{ $customer->address }}</th>
                <th>{{ $customer->telephone }}</th>
            </tr>
        @endforeach
    </table>

    <button type="button" onclick="location.href='/customers/address'">新規作成</button>
</body>

</html>
