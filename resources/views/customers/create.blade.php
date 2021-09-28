<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>create</title>
</head>
<body>
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>新規登録画面</h1>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <p>名前
            <input type="text" name="name" value="{{ old('name') }}">
        </p>
        <p>メールアドレス
            <input type="email" name="email" value="{{ old('email') }}">
        </p>
        <p>郵便番号
            <input type="text" name="postaddress" value="{{ old('postaddress', $data['postaddress']) }}">
        </p>
        <p>住所
            <textarea name="address">{{ old('address', $data['address']) }}</textarea>
        </p>
        <p>電話番号
            <input type="text" name="telephone" value="{{ old('telephone') }}">
        </p>
        <input type="submit" value="登録">
    </form>
    <button type="button" onclick="location.href='/customers/address'">郵便番号検索に戻る</button>
</body>
</html>
