<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>address</title>
</head>

<body>
    <h1>郵便番号検索画面</h1>
    <form action="{{ route('customers.create') }}" method="get">
        @csrf
        <p>郵便番号検索
            <input type="text" name="postaddress" placeholder="検索したい郵便番号">
            <input type="submit" value="検索する">
        </p>
    </form>
    <button type="button" onclick="location.href='{{ route('customers.index') }}'">一覧に戻る</button>
</body>

</html>
