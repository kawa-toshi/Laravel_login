<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインフォーム</title>
    <!-- Bootstrap Scripts-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Bootstrap Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">

</head>
<body>
<main class="form-signin">
  <form method="POST" action="{{ route('login') }}">
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <x-alert type="danger" :session="session('danger')"/>

    <h1 class="h3 mb-3 fw-normal">ログインフォーム</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" >
      <label for="floatingInput">メールアドレス</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" >
      <label for="floatingPassword">パスワード</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">ログイン</button>
  </form>

  <div style="margin-top:10px;">
    <a class="w-100 btn btn-lg btn-primary" href="{{ route('regist.show') }}">新規会員登録</a>
  </div>

</main>

</body>
</html>
