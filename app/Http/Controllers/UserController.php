<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\User;

class UserController extends Controller
{
    public function mypage()
    {
        $items = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        $users = User::all();
        return view('home.mypage', compact('items', 'areas', 'genres', 'users'));
    }
}
