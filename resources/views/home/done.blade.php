@extends('layouts.default')

@section('head')
    <link rel="stylesheet" href="/css/done.css"/>
@endsection

@section('content')
    @auth
        <div class="card">
            <div class="thanks">
                <span class="txt">ご予約ありがとうございます</span><br>
                <button type="button" class="return_btn" onClick="history.back()">戻る</button>
            </div>
        </div>
    @endauth
@endsection

@section('scripts')
@endsection
