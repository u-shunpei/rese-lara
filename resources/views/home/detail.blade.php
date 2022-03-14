<!DOCTYPE html>
<html lang="jd">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="/css/detail.css" />
</head>

<body>
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
    <main>
        <div class="card">
            <span class="back_btn">
                    <a href="http://localhost:8000/" class="back">&lt;</a>
                </span>
            <span class="card-shop_name">{{ $_GET['name']; }}</span>
            <div class="card_img">
                <img src="{{ $_GET['image_url']; }}" alt="" />
            </div>
            <div class="card_tag">
                <span class="card_area">#{{ $_GET['area_id']; }}</span>
                <span class="card_genre">#{{ $_GET['genre_id']; }}</span>
            </div>
            <p class="card_content">{{ $_GET['description']; }}</p>
        </div>
        <div class="reservation">
            <h2>予約</h2>
            <form action="/reserve" method="POST" class="">
                @csrf
                <div class="reserve">
                    <input type="hidden" name="shop_id" value="{{ $_GET['id']; }}" />
                    <!-- <input type="text" name="user_id" value="" /> -->
                    <input type="hidden" name="area_id" value="{{ $_GET['area_id']; }}" />
                    <input type="hidden" name="genre_id" value="{{ $_GET['genre_id']; }}" />
                    <input type="date" name="date" class="date" v-model="date" /><br />
                    <select name="time" class="time" id="time" onchange="myfunc()">
                            <option value="selected_time"></option>
                            <option value="16:00:00">16:00</option>
                            <option value="17:00:00">17:00</option>
                            <option value="18:00:00">18:00</option>
                            <option value="19:00:00">19:00</option>
                            <option value="20:00:00">20:00</option>
                            <option value="21:00:00">21:00</option>
                            <option value="22:00:00">22:00</option>
                            <option value="23:00:00">23:00</option></select
                        ><br />
                        <select
                            name="num_of_users"
                            class="num_of_users"
                            id="num_of_users"
                            onchange="func()"
                        >
                            <option value="selected_num"></option>
                            <option value="1">1人</option>
                            <option value="2">2人</option>
                            <option value="3">3人</option>
                            <option value="4">4人</option>
                            <option value="5">5人</option>
                            <option value="6">6人</option>
                        </select>
                    <table>
                        <tr>
                            <th>Shop</th>
                            <td>
                                <span>{{ $_GET["name"]; }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>
                                <span id="target_time"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>Number</th>
                            <td>
                                <span id="target_num"></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <input type="submit" class="reserve_btn" value="予約する" />
            </form>
        </div>
    </main>
    @endauth
    <script src="/js/main.js"></script>
    <script src="/js/detail.js"></script>
</body>

</html>
