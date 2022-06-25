@extends('layouts.default')

@section('head')
    <link rel="stylesheet" href="/css/thanks.css" />
    <script src="https://kit.fontawesome.com/d5b4d4baf0.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="card">
        <p>ログインしました</p>
        <button class="home_btn">
            <a href="https://restaurant-pj.herokuapp.com/" class="home">Homeへ</a>
{{--            <a href="http://localhost:8000/">Homeへ</a>--}}
        </button>
    </div>
@endsection

@section('scripts')
@endsection
