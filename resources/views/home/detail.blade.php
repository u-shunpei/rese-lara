@extends('layouts.default')

@section('head')
    <link rel="stylesheet" href="/css/detail.css"/>
@endsection

@section('content')
    @auth
        <div class="card">
            <div class="shop_ttl">
            <span class="back_btn">
                <a href="https://rese-larapj.herokuapp.com/" class="back">&lt;</a>
            </span>
                <span class="card-shop_name">{{ $shop->name }}</span>
            </div>
            <div class="card_img">
                <img src="{{ $shop->image_url }}" alt=""/>
            </div>
            <div class="card_tag">
                <span class="card_area">#{{ $shop->area->name }}</span>
                <span class="card_genre">#{{ $shop->genre->name }}</span>
            </div>
            <p class="card_content">{{ $shop->description }}</p>
        </div>
        <div class="reservation">
            <h2>予約</h2>
            <form action="/reserve" method="POST" class="">
                @csrf
                <div class="reserve">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}"/>
                    <!-- <input type="text" name="user_id" value="" /> -->
                    <input type="hidden" name="area_id" value="{{ $shop->area_id }}"/>
                    <input type="hidden" name="genre_id" value="{{ $shop->genre_id }}"/>

                    <input type="date" name="date" class="date" id="date" onchange="reservationDate()"/>

                    <select name="time" class="time" id="time" onchange="reservationTime()">
                        <option value="selected_time"></option>
                        @for($i = 16; $i < 24; $i++)
                            <option value="{{ $i }}:00">{{ $i }}:00</option>
                        @endfor
                    </select><br/>
                    <select name="num_of_users" class="num_of_users" id="num_of_users" onchange="reservationNumber()">
                        <option value="selected_num"></option>
                        @for($i = 1; $i < 7; $i++)
                            <option value="{{ $i }}">{{ $i }}人</option>
                        @endfor
                    </select>
                    <table>
                        <tr>
                            <th>Shop</th>
                            <td>
                                <span>{{ $shop->name }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>
                                <span id="target_date"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>
                                <span id="target_time"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>Number</th>
                            <td>
                                <span id="target_num"></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <input type="submit" class="reserve_btn" value="予約する"/>
            </form>
        </div>
    @endauth
@endsection

@section('scripts')
    <script>
        function reservationTime() {
            const value = document.getElementById("time").value;
            const target = document.getElementById("target_time");
            target.innerHTML = value;
        }

        function reservationNumber() {
            const value = document.getElementById("num_of_users").value;
            const target = document.getElementById("target_num");
            target.innerHTML = value + '人';
        }

        function reservationDate() {
            const value = document.getElementById("date").value;
            const target = document.getElementById("target_date");
            target.innerHTML = value;
        }
    </script>
@endsection
