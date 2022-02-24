<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="css/shop.css">
</head>
<body>
  <div class="container">
    <div class="ttl">
    @auth
    <nav class="nav" id="nav">
      <ul>
        <li><a href="http://localhost:8000/">Home</a></li>
        <form action="/logout" method="post">
          @csrf
           <li><button>Logout</button></li>
        </form>
        <li><a href="http://localhost:8000/mypage">Mypage</a></li>
      </ul>
    </nav>
    <div class="menu" id="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
    </div>
    @endauth
    @guest
    <nav class="nav" id="nav">
      <ul>
        <li><a href="http://localhost:8000/">Home</a></li>
        <li><a href="http://localhost:8000/register">Registration</a></li>
        <li><a href="http://localhost:8000/login">Login</a></li>
      </ul>
    </nav>
    <div class="menu" id="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
    </div>
    @endguest
    <h1>Rese</h1>
    <form action="/" method="post" class="search">
      @csrf
      <select name="area_id" id="">
        <option value="all_area">All area</option>
        @foreach($items as $item)
        @if ($loop->index < 3)
        <option value="{{ $item->area->id }}" name="name">{{ $item->area->name }}</option>
        @endif
        @endforeach
      </select>
      <select name="genre_id" id="">
        <option value="">All genre</option>
        @foreach($items as $item)
        @if($loop->index < 5)
        <option value="{{ $item->genre->id }}" name="genre_name">{{ $item->genre->name }}</option>
        @endif
        @endforeach
      </select>
      <input type="search" name="" placeholder="search..." />
      <button class="index-btn">検索</button>
    </form>
    </div>
    @if(isset($items))
    <main>
      <div class="shoplist">
      @foreach ($items as $item)
      <div class="shop_card">
        <div class="shop_img">
          <img src="{{$item->image_url}}" alt="">
        </div>
        <div class="shop_content">
          <p class="shop_name">{{$item->name}}</p>
          <p class="shop_tag">
            <span class="shop_area">＃{{$item->area->name}}</span>
            <span class="shop_genre">＃{{$item->genre->name}}</span>
          </p>
          <form action="/detail/{shop_id}" method="GET">
          @csrf
            <input type="hidden" name="id" value="{{$item->id}}" />
            <input type="hidden" name="name" value="{{ $item->name }}" />
            <input type="hidden" name="area_id" value="{{ $item->area->name }}" />
            <input type="hidden" name="genre_id" value="{{ $item->genre->name }}" />
            <input type="hidden" name="description" value="{{ $item->description }}" />
            <input type="hidden" name="image_url" value="{{ $item->image_url }}" />
            <input type="submit" class="detail_btn" value="詳しく見る" />
          </form>
        </div>
      </div>
      @endforeach
      </div>
    </main>
     @endif
     <script>
       const target = document.getElementById("menu");
    target.addEventListener('click', () => {
    target.classList.toggle('open');
    const nav = document.getElementById("nav");
    nav.classList.toggle('in');
    });
     </script>
</body>
</html>