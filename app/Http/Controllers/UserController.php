<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = Auth::user();
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('home.mypage', compact( 'likes', 'user', 'reservations'));
//        $shops = shop::all();
//        $reservations = reservation::all();
//        return view('home.mypage', compact('shops', 'reservations'));
    }
    public function delete(Request $request)
    {
//        Reservation::where('shop_id', $request->shop_id)->where('user_id', Auth::id())->delete();
        Reservation::where('id', $request->id)->where('user_id', Auth::id())->delete();
//        $user = Auth::user();
//        $reservations = Reservation::all();
//        $likes = Like::where('user_id', Auth::id())->get();
//        return view('home.mypage', compact('user', 'reservations', 'likes'));
        return redirect('/mypage');
    }
}
