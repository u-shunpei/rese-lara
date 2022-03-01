<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/shop.css">
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
                        <li><button class="logout">Logout</button></li>
                    </form>
                    <li><a href="http://localhost:8000/mypage">Mypage</a></li>
                </ul>
            </nav>
            <div class="menu" id="menu">
                <span class="menu__line--top"></span>
                <span class="menu__line--middle"></span>
                <span class="menu__line--bottom"></span>
            </div>
            @endauth @guest
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
            @auth
            <form action="/" method="post" class="search">
                @csrf
                <select name="area_id" id="">
          <option value="">All area</option>
          @foreach($areas as $area)
          <option value="{{ $area->id }}" name="name">{{ $area->name }}</option>
          @endforeach
        </select>
                <select name="genre_id" id="">
          <option value="">All genre</option>
          @foreach($genres as $genre)
           <option value="{{ $genre->id }}" name="genre_name">{{ $genre->name }}</option>
            @endforeach
        </select>
                <input type="search" name="name" placeholder="search..." />
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
                        <form action="/like" method="POST">
                            @csrf
                            <input type="text" name="shop_id" value="{{ $item->id }}" />
                            <input type="submit" class="like_btn" value="いいね" />
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
        @endif @endauth
        <script src="/js/main.js"></script>
</body>

</html>