<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .nav{
  position: absolute;
  height: 100vh;
  width: 100%;
  left: -100%;
  background: #eee;
  transition: .7s;
  text-align: center;
  z-index: 3;
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
  z-index: 4;
  background-color: blue;
}
.menu__line--top,
.menu__line--middle,
.menu__line--bottom {
  display: inline-block;
  height: 4px;
  background-color: white;
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
.top {
  display: flex;
  margin-left: 50px;
}
h1 {
  margin-left: 50px;
  color: blue;
}
body{
  background-color: #dbdbdb;
}
.card{
  background-color: white;
  width: 30%;
  height: 30vh;
  margin:30px auto;
  text-align: center;
  z-index: 2;
}
.thanks {
  position: relative;
  top: 20%;
}
.txt {
  line-height: 80px;
  font-size: 20px;
}
.return_btn {
  background-color: blue;
  color: white;
  padding: 3px 10px;
  border-radius: 5px;
  border: none;
}
  </style>
</head>
<body>
   @auth
    <nav class="nav" id="nav">
      <ul>
        <li><a href="http://localhost:8000/">Home</a></li>
        <li><a href="http://localhost:8000/login">Logout</a></li>
        <li><a href="http://localhost:8000/mypage">Mypage</a></li>
      </ul>
    </nav>
    <div class="top">
      <div class="menu" id="menu">
        <span class="menu__line--top"></span>
        <span class="menu__line--middle"></span>
        <span class="menu__line--bottom"></span>
      </div>
      <h1>Rese</h1>
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
    <h1>Rese</h1>
    @endguest
    
    <div class="card">
      <div class="thanks">
        <span class="txt">ご予約ありがとうございます</span><br>
         <button type="button" class="return_btn" onClick="history.back()">戻る</button>
      </div>
    </div>
  </div>
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