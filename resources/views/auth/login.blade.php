<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <script src="https://kit.fontawesome.com/d5b4d4baf0.js" crossorigin="anonymous"></script>

</head>

<x-guest-layout>

    <body>
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
            <!-- <x-slot name="logo">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </x-slot> -->


            <h2>Login</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="card_container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="name" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Username" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Email" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                    <!--<label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600"> {{ __('Remember me') }}--></span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            <!--{{ __('Forgot your password?') }}-->
                            </a>
                        @endif

                        <x-button class="ml-3">
                            {{ __('ログイン') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </x-auth-card>
    </body>
</x-guest-layout>
</html>
