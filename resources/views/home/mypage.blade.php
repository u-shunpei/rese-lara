@extends('layouts.default')

@section('head')
    <link rel="stylesheet" href="/css/mypage.css"/>
    <script src="https://kit.fontawesome.com/d5b4d4baf0.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="container">
        @auth
            <div class="flex-reservation">
                <div class="reservation_list">
                    <p class="hidden">hidden</p>
                    <p class="stu_ttl">予約状況</p>
                    @foreach($reservations as $reservation)
                        <div class="reservation">
                            <form action="{{ route('mypage.delete', ['id' => $reservation->id]) }}" method="POST">
                                @csrf
                                <div class="reservation_card">
                                    <div class="reservation_ttl">
                                        <span class="reserve"><i class="fa-solid fa-clock"></i>予約</span>
                                        <button class="x_btn">
                                            <i class="fa-regular fa-circle-xmark"></i>
                                        </button>
                                    </div>
                                    <table>
                                        <tr>
                                            <th>Shop</th>
                                            <td>{{ $reservation->shop->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td>{{ $reservation->date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Time</th>
                                            <td>{{ $reservation->time }}</td>
                                        </tr>
                                        <tr>
                                            <th>Number</th>
                                            <td>{{ $reservation->num_of_users }}人</td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="shop_list">
                    <p class="user_name">{{$user->name}}さん</p>
                    <p class="likes_shops">お気に入り店舗</p>
                    <div class="flex_items">
                        @foreach ($likes as $like)
                            <div class="shop_card">
                                <div class="shop_img">
                                    <img src="{{$like->shop->image_url}}" alt=""/>
                                </div>
                                <div class="shop_content">
                                    <p class="shop_name">{{$like->shop->name}}</p>
                                    <p class="shop_tag">
                                        <span class="shop_area">＃{{$like->shop->area->name}}</span>
                                        <span class="shop_genre">＃{{$like->shop->genre->name}}</span>
                                    </p>
                                    <div class="btn">
                                        <a href="{{ route('shop.detail', $like->id) }}" class="detail_btn">詳しく見る</a>
                                        <button type="submit" class="fas like_btn" value="&#xf004">
                                            <i class="fa-solid fa-heart heart_red"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection

@section('scripts')
@endsection
