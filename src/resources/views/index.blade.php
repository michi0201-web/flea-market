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
  font-family: "Helvetica Neue", sans-serif;
  margin: 0;
  padding: 0;
  background-color: #fff;
}

.header {
  background-color: #000;
  color: white;
  padding: 15px 20px;
}

.header-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.logo {
  font-size: 24px;
  font-weight: bold;
}

.logo-gt {
  background: white;
  color: black;
  padding: 2px 6px;
  border-radius: 4px;
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

.link-button {
  background: none;
  color: white;
  border: none;
  cursor: pointer;
  font-size: 14px;
}

.listing-button {
  background-color: white;
  color: black;
  border-radius: 4px;
  padding: 6px 10px;
  font-weight: bold;
  text-decoration: none;
}

.tabs {
  display: flex;
  gap: 20px;
  padding: 20px;
  border-bottom: 1px solid #ccc;
}

.tab-button {
  background: none;
  border: none;
  font-size: 16px;
  cursor: pointer;
  color: black;
}

.tab-button.active {
  color: red;
  font-weight: bold;
}

.item-list {
  display: flex;
  padding: 30px;
  gap: 30px;
  flex-wrap: wrap;
  justify-content: flex-start;
}

.item-card {
  width: 150px;
  text-align: center;
  text-decoration: none;
  color: black;
  position: relative;
}

.item-image {
  width: 100%;
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

.sold-label {
  position: absolute;
  top: 10px;
  right: 10px;
  background: red;
  color: white;
  padding: 2px 6px;
  font-size: 12px;
  border-radius: 4px;
}

.hidden {
  display: none;
}
　</style>
</head>

<body>
  <header class="header">
    <div class="header-inner">
      <div class="logo"><span class="logo-gt">GT</span> COACHTECH</div>
      <form class="search-box">
        <input type="text" placeholder="なにをお探しですか？">
      </form>
      <nav class="nav-links">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="link-button">ログアウト</button>
        </form>
        <a href="/mypage">マイページ</a>
        <a href="/listing" class="listing-button">出品</a>
      </nav>
    </div>
  </header>

  <main class="main-content">
    <div class="tabs">
      <button class="tab-button active" data-tab="recommend">おすすめ</button>
      <button class="tab-button" data-tab="mylist">マイリスト</button>
    </div>

    <div class="item-list" id="recommend">
      @foreach ($items as $item)
        <a href="/items/{{ $item->id }}" class="item-card">
          <div class="item-image">商品画像</div>
          <div class="item-name">{{ $item->name }}</div>
          @if($item->is_sold)
            <div class="sold-label">SOLD</div>
          @endif
        </a>
      @endforeach
    </div>

    <div class="item-list hidden" id="mylist">
      @foreach ($myItems as $item)
        <a href="/items/{{ $item->id }}" class="item-card">
          <div class="item-image">商品画像</div>
          <div class="item-name">{{ $item->name }}</div>
          @if($item->is_sold)
            <div class="sold-label">SOLD</div>
          @endif
        </a>
      @endforeach
    </div>
  </main>

  <script>
    const tabs = document.querySelectorAll('.tab-button');
    const contents = document.querySelectorAll('.item-list');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        contents.forEach(c => c.classList.add('hidden'));

        tab.classList.add('active');
        document.getElementById(tab.dataset.tab).classList.remove('hidden');
      });
    });
  </script>
</body>

</html>