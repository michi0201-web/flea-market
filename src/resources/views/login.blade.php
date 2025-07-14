<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
  <style>
    body {
  margin: 0;
  font-family: "Helvetica Neue", sans-serif;
  background-color: #fff;
}

.header {
  background-color: #000;
  padding: 15px;
  color: #fff;
}

.logo {
  font-size: 24px;
  font-weight: bold;
  display: flex;
  align-items: center;
}

.logo .gt {
  margin-right: 8px;
  font-weight: bold;
  color: #fff;
}

.login-container {
  max-width: 400px;
  margin: 60px auto;
  padding: 0 20px;
  text-align: center;
}

.login-title {
  font-size: 24px;
  margin-bottom: 30px;
}

.login-form {
  display: flex;
  flex-direction: column;
  gap: 16px;
  text-align: left;
}

.login-form label {
  font-weight: bold;
  font-size: 14px;
}

.login-form input {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.login-btn {
  background-color: #ff5b5b;
  color: white;
  padding: 12px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  margin-top: 10px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.login-btn:hover {
  background-color: #e04c4c;
}

.register-link {
  margin-top: 20px;
}

.register-link a {
  color: #007bff;
  text-decoration: none;
  font-size: 14px;
}

.form__error {
  color: red;
  font-size: 14px;
  margin-top: 4px;
}

@media (min-width: 1400px) and (max-width: 1540px) {
  .login-container {
    max-width: 500px;
    margin-top: 80px;
  }

  .login-title {
    font-size: 28px;
  }

  .login-form input {
    font-size: 18px;
    padding: 12px;
  }

  .login-btn {
    font-size: 18px;
    padding: 14px;
  }
}

@media (min-width: 768px) and (max-width: 850px) {
  .login-container {
    max-width: 90%;
    margin: 40px auto;
    padding: 0 10px;
  }

  .login-title {
    font-size: 22px;
  }

  .login-form input {
    font-size: 16px;
    padding: 10px;
  }

  .login-btn {
    font-size: 16px;
    padding: 12px;
  }

  .register-link a {
    font-size: 13px;
  }
}
  </style>
</head>

<body>
  <header class="header">
    <div class="logo"> 
      <span class="gt"></span> COACHTECH
    </div>
  </header>

  <main class="login-container">
    <h1 class="login-title">ログイン</h1>
    <form action="/login" method="POST" class="login-form" novalidate>
      @csrf
      <label for="email">メールアドレス</label>
      <input type="email" id="email" name="email" required value="{{ old('email') }}">
      <div class="form__error">
        @error('email')
        {{ $message }}
        @enderror
      </div>

      <label for="password">パスワード</label>
      <input type="password" id="password" name="password" required value="{{ old('password') }}">
      <div class="form__error">
        @error('password')
        {{ $message }}
        @enderror
      </div>

      <button type="submit" class="login-btn">ログインする</button>
    </form>

    <div class="register-link">
      <a href="/register">会員登録はこちら</a>
    </div>
  </main>
</body>

</html>