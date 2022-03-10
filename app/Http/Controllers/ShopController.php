<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\User;
use App\Models\Like;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        $likes = Like::all();
        $users = User::all();
        return view('home.index', compact('shops', 'areas', 'genres', 'likes', 'users'));
    }
    public function detail(Request $request)
    {
        $shops = Shop::all();
        return view('home.detail', compact('shops'));
    }
    public function search(Request $request)
    {

        $shops = Shop::searchShops($request->area_id, $request->genre_id, $request->name);

        // where('area_id', $request->area_id)->where('genre_id', $request->genre_id)->orWhere('name', $request->name)->get();
        // dd($items);
        $areas = Area::all();
        $genres = Genre::all();
        return view('home.index', compact('shops', 'areas', 'genres'));
    }
}
