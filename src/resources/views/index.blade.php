<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
  <style>
    body {
      margin: 0;
      font-family: "Helvetica Neue", sans-serif;
      background-color: #fff;
    }

    /* ヘッダー */
    .header {
      background-color: #000;
      color: #fff;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo {
      font-size: 20px;
      font-weight: bold;
    }

    .logo .gt {
      display: inline-block;
      width: 28px;
      height: 24px;
      background-color: white;
      margin-right: 5px;
    }

    .search-box input {
      padding: 6px;
      width: 200px;
      border-radius: 4px;
      border: none;
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .listing-button {
      padding: 6px 12px;
      background-color: #fff;
      color: #000;
      font-weight: bold;
      border-radius: 4px;
      text-decoration: none;
    }

    /* タブ */
    .tabs {
      display: flex;
      padding: 12px 20px;
      border-bottom: 1px solid #ccc;
      gap: 20px;
    }

    .tab-button {
      background: none;
      border: none;
      font-size: 16px;
      cursor: pointer;
      color: #888;
    }

    .tab-button.active {
      color: red;
      font-weight: bold;
    }

    /* 商品カード */
    .item-list {
      display: flex;
      padding: 20px;
      gap: 30px;
      flex-wrap: wrap;
    }

    .item-card {
      width: 150px;
      text-align: center;
      text-decoration: none;
      color: black;
    }

    .item-image {
      width: 150px;
      height: 150px;
      background-color: #ccc;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
    }

    .item-name {
      margin-top: 8px;
      font-size: 14px;
    }

    .hidden {
      display: none;
    }
  </style>
</head>

<body>

  <!-- ヘッダー -->
  <header class="header">
    <div class="logo"><span class="gt"></span> COACHTECH</div>
    <form class="search-box">
      <input type="text" placeholder="なにをお探しですか？">
    </form>
    <nav class="nav-links">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="background: none; border: none; color: white;">ログアウト</button>
      </form>
      <a href="/mypage">マイページ</a>
      <a href="/listing" class="listing-button">出品</a>
    </nav>
  </header>

  <!-- タブ -->
  <div class="tabs">
    <button class="tab-button active" data-tab="recommend">おすすめ</button>
    <button class="tab-button" data-tab="mylist">マイリスト</button>
  </div>

  <!-- おすすめ商品 -->
  <div class="item-list" id="recommend">
    @foreach ($items as $item)
      <a href="/items/{{ $item->id }}" class="item-card">
        <div class="item-image">
          <img src="{{ $item->image_url ?? '/images/sample.png' }}" alt="商品画像" width="150" height="150">
        </div>
        <div class="item-name">{{ $item->name }}</div>
      </a>
    @endforeach
  </div>

  <!-- マイリスト -->
  <div class="item-list hidden" id="mylist">
    @foreach ($myItems as $item)
      <a href="/items/{{ $item->id }}" class="item-card">
        <div class="item-image">
          <img src="{{ $item->image_url ?? '/images/sample.png' }}" alt="商品画像" width="150" height="150">
        </div>
        <div class="item-name">{{ $item->name }}</div>
      </a>
    @endforeach
  </div>

  <!-- タブ切替スクリプト -->
  <script>
    const tabs = document.querySelectorAll('.tab-button');
    const lists = document.querySelectorAll('.item-list');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        lists.forEach(l => l.classList.add('hidden'));

        tab.classList.add('active');
        document.getElementById(tab.dataset.tab).classList.remove('hidden');
      });
    });
  </script>
</body>

</html>