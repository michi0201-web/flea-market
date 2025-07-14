<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
  <style>
    body {
  margin: 0;
  font-family: "Helvetica Neue", sans-serif;
  background-color: #f9f9f9;
}

.header {
  background-color: #000;
  padding: 15px 20px;
  color: #fff;
}

.header-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.logo {
  font-size: 24px;
  font-weight: bold;
  display: flex;
  align-items: center;
}

.logo-gt {
  font-weight: bold;
  margin-right: 5px;
}

.search-box input {
  padding: 6px 10px;
  border-radius: 4px;
  border: none;
  width: 220px;
}

.nav-links {
  display: flex;
  align-items: center;
  gap: 16px;
}

.nav-links a {
  color: #fff;
  text-decoration: none;
  font-size: 14px;
  padding: 6px 12px;
}

.listing-button {
  background-color: #fff;
  color: #000;
  border-radius: 4px;
  font-weight: bold;
}

.profile-container {
  max-width: 500px;
  margin: 40px auto;
  padding: 30px;
  background-color: #fff;
  border-radius: 8px;
  text-align: center;
}

.profile-title {
  font-size: 22px;
  margin-bottom: 30px;
}

.profile-image-area {
  margin-bottom: 20px;
}

.circle-image {
  width: 100px;
  height: 100px;
  background-color: #ccc;
  border-radius: 50%;
  margin: 0 auto 10px;
}

.upload-button {
  display: inline-block;
  background-color: #fff0f0;
  border: 1px solid #ff5b5b;
  color: #ff5b5b;
  font-size: 13px;
  padding: 6px 10px;
  border-radius: 4px;
  cursor: pointer;
}

.profile-form {
  display: flex;
  flex-direction: column;
  gap: 16px;
  text-align: left;
}

.profile-form label {
  font-weight: bold;
  font-size: 14px;
}

.profile-form input {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.update-button {
  background-color: #ff5b5b;
  color: white;
  padding: 12px;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  margin-top: 10px;
  cursor: pointer;
}
  </style>
</head>

<body>
  <header class="header">
    <div class="header-inner">
      <div class="logo">
        <span class="logo-gt"></span> COACHTECH
      </div>
      <form class="search-box">
        <input type="text" placeholder="なにをお探しですか？">
      </form>
      <nav class="nav-links">
        <form method="POST" action="/logout">
    @csrf
    <button type="submit" class="logout-link">ログアウト</button>
  </form>
        <a href="/mypage">マイページ</a>
        <a href="/listing" class="listing-button">出品</a>
      </nav>
    </div>
  </header>

  <main class="profile-container">
    <h1 class="profile-title">プロフィール設定</h1>
    <div class="profile-image-area">
      <div class="circle-image"></div>
      <label class="upload-button">
        画像を選択する
        <input type="file" hidden>
      </label>
    </div>

    <form class="profile-form" action="/profile/update" method="POST">
      @csrf
      <label>ユーザー名</label>
      <input type="text" name="username">

      <label>郵便番号</label>
      <input type="text" name="postal_code">

      <label>住所</label>
      <input type="text" name="address">

      <label>建物名</label>
      <input type="text" name="building">

      <button type="submit" class="update-button">更新する</button>
    </form>
  </main>
</body>

</html>