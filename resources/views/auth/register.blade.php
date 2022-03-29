<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <script src="https://kit.fontawesome.com/d5b4d4baf0.js" crossorigin="anonymous"></script>
</head>
<body>

</body>
</html>

<x-guest-layout>
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
    <x-auth-card>
        <div class="card">
            <h2>Resistration</h2>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="card_container">
                <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                    <div>
                        <x-label for="name" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Username" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Email" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        <!--{{ __('Already registered?') }}-->
                        </a>

                        <x-button class="ml-3">
                            {{ __('登録') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
