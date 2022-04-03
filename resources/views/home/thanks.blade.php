@extends('layouts.default')

@section('head')
    <link rel="stylesheet" href="/css/thanks.css"/>
@endsection

@section('content')
    @auth
        <div class="card">
            <p>会員登録ありがとうございます</p>
            <button>
                <a href="https://restaurant-pj.herokuapp.com/">ログインする</a>
            </button>
        </div>
    @endauth
@endsection

@section('scripts')
@endsection

