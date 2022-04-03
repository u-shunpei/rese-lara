@extends('layouts.default')

@section('head')
    <link rel="stylesheet" href="/css/auth.css"/>
    <script src="https://kit.fontawesome.com/d5b4d4baf0.js" crossorigin="anonymous"></script>
@endsection

<x-guest-layout>
@section('content')

    <x-auth-card>
        <div class="card">
            <h2>Login</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <div class="card_container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="name"/>

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Username"/>
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-label for="email"/>

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Email"/>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password"/>

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Password"/>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                               href="{{ route('password.request') }}">
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
    @endsection

    @section('scripts')
    @endsection
</x-guest-layout>

