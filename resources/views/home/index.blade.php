<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="/css/shop.css" />
    <script src="https://kit.fontawesome.com/d5b4d4baf0.js" crossorigin="anonymous"></script>
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
                    <li>
                        <a href="http://localhost:8000/mypage">Mypage</a>
                    </li>
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
                        <li>
                            <a href="http://localhost:8000/register">Registration</a
                            >
                        </li>
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
                            <option value="{{ $area->id }}" name="name">
                                {{ $area->name }}
                            </option>
                        @endforeach
                    </select>
                    <select name="genre_id" id="">
                        <option value="">All genre</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" name="genre_name">
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="search" name="name" placeholder="search..." />
                    <button class="index-btn">検索</button>
                </form>
    </div>
    @if(isset($shops))
        <main>
            <div class="shoplist">
                @foreach ($shops as $shop)
                    <div class="shop_card">
                        <div class="shop_img">
                            <img src="{{$shop->image_url}}" alt="" />
                        </div>
                        <div class="shop_content">
                            <p class="shop_name">{{$shop->name}}</p>
                            <p class="shop_tag">
                                <span class="shop_area">＃{{$shop->area->name}}</span
                                >
                                <span class="shop_genre"
                                >＃{{$shop->genre->name}}</span
                                >
                            </p>
                            <div>
                                <form action="/detail/{shop_id}" method="GET" class="detail">
                                    @csrf
                                    <input
                                        type="hidden"
                                        name="id"
                                        value="{{$shop->id}}"
                                    />
                                    <input
                                        type="hidden"
                                        name="name"
                                        value="{{ $shop->name }}"
                                    />
                                    <input
                                        type="hidden"
                                        name="area_id"
                                        value="{{ $shop->area->name }}"
                                    />
                                    <input
                                        type="hidden"
                                        name="genre_id"
                                        value="{{ $shop->genre->name }}"
                                    />
                                    <input
                                        type="hidden"
                                        name="description"
                                        value="{{ $shop->description }}"
                                    />
                                    <input
                                        type="hidden"
                                        name="image_url"
                                        value="{{ $shop->image_url }}"
                                    />
                                    <input
                                        type="submit"
                                        class="detail_btn"
                                        value="詳しく見る"
                                    />
                                </form>
                                @if(count($shop->likes)===0)
                                    <form action="/like" method="POST" class="like">
                                        @csrf
                                        <input type="hidden" name="shop_id" value="{{ $shop->id }}" />
                                        <button type="submit" class="fas like_btn" value="&#xf004">
                                            <i class="fa-solid fa-heart gray_heart"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="/like/delete" method="POST" class="like">
                                        @csrf
                                        <input type="hidden" name="shop_id" value="{{ $shop->id }}" />
                                        <button type="submit" class="fas like_btn" value="&#xf004">
                                            <i class="fa-solid fa-heart heart_red" ></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    @endif @endauth
</div>
<script src="/js/main.js"></script>
<script src="/js/shop.js"></script>
</body>
</html>
