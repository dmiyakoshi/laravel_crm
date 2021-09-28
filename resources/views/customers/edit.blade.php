<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>edit</title>
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
    <h1>編集画面</h1>
    <form action="{{ route('customers.update', $customer) }}" method="POST">
        @csrf
        @method('PATCH')
        <p>名前
            <input type="text" name="name" value="{{ old('name', $customer->name) }}">
        </p>
        <p>メールアドレス
            <input type="email" name="email" value="{{ old('email', $customer->email) }}">
        </p>
        <p>郵便番号
            <input type="text" name="postaddress" value="{{ old('postaddress', $customer->postaddress) }}">
        </p>
        <p>住所
            <textarea name="address">{{ old('address', $customer->address) }}</textarea>
        </p>
        <p>電話番号
            <input type="text" name="telephone" value="{{ old('telephone', $customer->telephone) }}">
        </p>
        <input type="submit" value="登録">
    </form>
    <button type="button" onclick="location.href='{{ route('customers.show', $customer) }}'">戻る</button>
</body>
</html>
