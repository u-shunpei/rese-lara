<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    a{
      text-decoration: none;
      color: blue
    }

    .nav{
      position: absolute;
      height: 100vh;
      width: 100%;
      left: -100%;
      background: #eee;
      transition: .7s;
      text-align: center; 
    }
    .nav ul{
      padding-top: 80px;
    }
    .nav ul li{
      list-style-type: none;
      margin-top: 50px;
    }
    .menu {
      display: inline-block;
      width: 36px;
      height: 32px;
      cursor: pointer;
      position: relative;
      left: 20px;
      top: 20px;
    }
    .menu__line--top,
    .menu__line--middle,
    .menu__line--bottom {
      display: inline-block;
      height: 4px;
      background-color: #000;
      position: absolute;
      transition: 0.5s;
    }
    .menu__line--top {
      top: 0;
      width: 50%;
    }
    .menu__line--middle {
      top: 14px;
      width: 100%;
    }
    .menu__line--bottom {
      bottom: 0;
      width: 20%;
    }
    .menu.open span:nth-of-type(1) {
      top: 14px;
      transform: rotate(45deg);
      width: 100%;
    }
    .menu.open span:nth-of-type(2) {
      opacity: 0;
    }
    .menu.open span:nth-of-type(3) {
      top: 14px;
      transform: rotate(-45deg);
      width: 100%;
    }
    .in{
      transform: translateX(100%);
    }
  </style>
</head>
<body>
  <div class="container">
    @auth
    <nav class="nav" id="nav">
      <ul>
        <li><a href="http://localhost:8000/">Home</a></li>
        <form action="/logout" method="post">
          @csrf
           <li><a href="http://localhost:8000/logaut">Logout</a></li>
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
  </div>
  <a href="https://chiebukuro.yahoo.co.jp/" style="font-size:72px; text-decoration:none;" alt="ハートボタン">&#9829;</a>
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