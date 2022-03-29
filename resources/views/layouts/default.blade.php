<!DOCTYPE html>
<html lang="jd">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
    <link rel="stylesheet" href="/css/reset.css"/>
    <link rel="stylesheet" href="/css/nav.css"/>
    @yield('head')
</head>

<body>
    <div class="ttl">
        @auth
            <nav class="nav" id="nav">
                <ul>
                    <li><a href="http://localhost:8000/">Home</a></li>
                    <form action="/logout" method="post">
                        @csrf
                        <li>
                            <button class="logout">Logout</button>
                        </li>
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
    @auth
    <main>
        @yield('content')
    </main>
@endauth
<script src="/js/main.js"></script>
@yield('scripts')
</body>
</html>
