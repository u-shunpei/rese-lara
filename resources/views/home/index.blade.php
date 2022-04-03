@extends('layouts.default')

@section('head')
    <link rel="stylesheet" href="/css/shop.css"/>
    <script src="https://kit.fontawesome.com/d5b4d4baf0.js" crossorigin="anonymous"></script>
@endsection

<div class="nav_flex">
    @section('content')
        @auth
            <form action="/" method="post" class="search">
                @csrf
                <select name="area_id" class="area_id" id="">
                    <option value="">All area</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" name="name">
                            {{ $area->name }}
                        </option>
                    @endforeach
                </select>
                <select name="genre_id" class="genre_id" id="">
                    <option value="">All genre</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" name="genre_name">
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                <input type="search" name="name" class="name" placeholder="search..."/>
                <button class="search_btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
</div>
@if(isset($shops))
    <main>
        <div class="shop_list">
            @foreach ($shops as $shop)
                <div class="shop_card">
                    <div class="shop_img">
                        <img src="{{$shop->image_url}}" alt=""/>
                    </div>
                    <div class="shop_content">
                        <p class="shop_name">{{$shop->name}}</p>
                        <p class="shop_tag">
                            <span class="shop_area">＃{{$shop->area->name}}</span
                            >
                            <span class="shop_genre"
                            >＃{{$shop->genre->name}}</span
                            >
                        </p>
                        <div class="btn">
                            <a href="{{ route('detail.shop', $shop->id) }}" class="detail_btn">詳しく見る</a>
                            @if(count($shop->likes)===0)
                                <form action="/like" method="POST" class="like">
                                    @csrf
                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}"/>
                                    <button type="submit" class="fas like_btn" value="&#xf004">
                                        <i class="fa-solid fa-heart gray_heart"></i>
                                    </button>
                                </form>
                            @else
                                <form action="/like/delete" method="POST" class="like">
                                    @csrf
                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}"/>
                                    <button type="submit" class="fas like_btn" value="&#xf004">
                                        <i class="fa-solid fa-heart heart_red"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    @endif
    </div>
@endauth
@endsection

@section('scripts')
@endsection

