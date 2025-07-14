<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
  <style>
    body {
  font-family: sans-serif;
  margin: 0;
  padding: 0;
  background: #fff;
}

.header {
  background-color: #000;
  padding: 12px 20px;
}

.logo {
  color: white;
  font-size: 24px;
  font-weight: bold;
}

.logo .gt {
  background-color: white;
  color: black;
  padding: 2px 4px;
  border-radius: 3px;
  margin-right: 4px;
  font-weight: bold;
}

.container {
  max-width: 400px;
  margin: 50px auto;
  padding: 0 20px;
}

.title {
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 30px;
}

.form {
  display: flex;
  flex-direction: column;
}

.form label {
  margin-top: 15px;
  font-weight: bold;
}

.form input {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #aaa;
  border-radius: 4px;
  margin-top: 5px;
}

.register-btn {
  margin-top: 30px;
  padding: 12px;
  font-size: 16px;
  background-color: #ff5c5c;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.register-btn:hover {
  background-color: #e04b4b;
}

.login-link {
  text-align: center;
  margin-top: 20px;
}

.login-link a {
  color: #007bff;
  font-size: 14px;
  text-decoration: none;
}

.form__error {
  color: red;
  font-size: 14px;
  margin-top: 4px;
}

@media (max-width: 850px) and (min-width: 768px) {
  .container {
    max-width: 90%;
    margin: 30px auto;
    padding: 0 10px;
  }

  .title {
    font-size: 22px;
  }

  .form input,
  .register-btn {
    font-size: 15px;
    padding: 10px;
  }

  .register-btn {
    margin-top: 25px;
  }
}

@media (min-width: 1400px) and (max-width: 1540px) {
  .container {
    max-width: 500px;
  }

  .title {
    font-size: 26px;
  }

  .form input {
    font-size: 17px;
  }

  .register-btn {
    font-size: 17px;
  }
}
  </style>
</head>

<body>
  <header class="header">
    <div class="logo"><span class="gt"></span> COACHTECH</div>
  </header>

  <main class="container">
    <h1 class="title">会員登録</h1>

      <form method="POST" action="/register" class="form" novalidate>
      @csrf
      <label>ユーザー名</label>
      <input type="text" name="name" value="{{ old('name') }}">
      <div class="form__error">
        @error('name')
        {{ $message }}
        @enderror
      </div>

      <label>メールアドレス</label>
      <input type="email" name="email" value="{{ old('email') }}">
      <div class="form__error">
        @error('email')
        {{ $message }}
        @enderror
      </div>

      <label>パスワード</label>
      <input type="password" name="password" value="{{ old('password') }}">
      <div class="form__error">
        @error('password')
        {{ $message }}
        @enderror
      </div>

      <label>確認用パスワード</label>
      <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
      <div class="form__error">
        @error('password_confirmation')
        {{ $message }}
        @enderror
      </div>

      <button type="submit" class="register-btn">登録する</button>
    </form>

    <div class="login-link">
      <a href="/login">ログインはこちら</a>
    </div>
  </main>
</body>

</html>
