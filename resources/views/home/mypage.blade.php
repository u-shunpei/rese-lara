<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="/css/mypage.css" />
    <script src="https://kit.fontawesome.com/d5b4d4baf0.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
    @auth
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
        </div>
        <p class="user_name">{{$user->name}}さん</p>
        <p class="stu">
            <span class="stu_ttl">予約状況</span>
            <span class="likes_shops">お気に入り店舗</span>
        </p>
        <div class="flex-reservation">
            <div class="reservation">
                @foreach($reservations as $reservation)
                    <form action="/mypage/delete" method="get">
                        @csrf
                        <div class="reservation_card">
                            <div class="reservation_ttl">
                                <i class="fa-solid fa-clock"></i>
                                <span class="reserve">予約</span>
                                <button class="x_btn">
                                    <i class="fa-regular fa-circle-xmark"></i>
                                </button>
                            </div>
                            <table>
                                <tr>
                                    <th>Shop</th>
                                    <td>{{ $reservation->shop->name }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{ $reservation->date }}</td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td>{{ $reservation->time }}</td>
                                </tr>
                                <tr>
                                    <th>Number</th>
                                    <td>{{ $reservation->num_of_users }}</td>
                                </tr>
                            </table>
                        </div>
                    </form>
                @endforeach
            </div>
            <div class="shoplist">
                @foreach ($likes as $like)
                    <div class="shop_card">
                        <div class="shop_img">
                            <img src="{{$like->shop->image_url}}" alt="" />
                        </div>
                        <div class="shop_content">
                            <p class="shop_name">{{$like->shop->name}}</p>
                            <p class="shop_tag">
                                <span class="shop_area">＃{{$like->shop->area->name}}</span
                                >
                                <span class="shop_genre"
                                >＃{{$like->shop->genre->name}}</span
                                >
                            </p>
                            <form action="/detail/{shop_id}" method="GET" class="detail">
                                @csrf
                                <input
                                    type="hidden"
                                    name="id"
                                    value="{{$like->shop->id}}"
                                />
                                <input
                                    type="hidden"
                                    name="name"
                                    value="{{ $like->shop->name }}"
                                />
                                <input
                                    type="hidden"
                                    name="area_id"
                                    value="{{ $like->shop->area->name }}"
                                />
                                <input
                                    type="hidden"
                                    name="genre_id"
                                    value="{{ $like->shop->genre->name }}"
                                />
                                <input
                                    type="hidden"
                                    name="description"
                                    value="{{ $like->shop->description }}"
                                />
                                <input
                                    type="hidden"
                                    name="image_url"
                                    value="{{ $like->shop->image_url }}"
                                />
                                <input
                                    type="submit"
                                    class="detail_btn"
                                    value="詳しく見る"
                                />
                            </form>
                            <button type="submit" class="fas like_btn" value="&#xf004">
                                <i class="fa-solid fa-heart heart_red" ></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>
@endauth
<script src="/js/main.js"></script>
</body>
</html>
