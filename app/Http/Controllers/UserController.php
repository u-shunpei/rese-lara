<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mypage()
    {
        $likes = Like::where('user_id', Auth::id())->get();
        return view('home.mypage', compact( 'likes'));
//        $shops = shop::all();
//        $reservations = reservation::all();
//        return view('home.mypage', compact('shops', 'reservations'));
    }
}
