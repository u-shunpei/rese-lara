<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mypage()
    {
        $likes = Like::where('user_id', Auth::id())->get();
        return view('home.mypage', compact( 'likes'));
    }
}
