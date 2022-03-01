<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/mypage.css">
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
        </div>
        <div class="reservation">
            <p>予約状況</p>
            <div class="reservation_card">
                <div class="card_img">
                    <img src="/images/tokei.png" alt="">
                    <span class="">予約</span>
                </div>
                <table>
                    <tr>
                        <th>Shop</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        @endauth
    </div>
    <a href="https://chiebukuro.yahoo.co.jp/" style="font-size:72px; text-decoration:none;" alt="ハートボタン">&#9829;</a>
    <script src="/js/main.js"></script>
</body>

</html>