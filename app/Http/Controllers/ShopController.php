<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::getShops(Auth::id());
//        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        return view('home.index', compact('shops', 'areas', 'genres'));
    }
    public function detail(Request $request)
    {
        $shops = Shop::all();
        return view('home.detail', compact('shops'));
    }
    public function search(Request $request)
    {

        $shops = Shop::searchShops($request->area_id, $request->genre_id, $request->name);
        $areas = Area::all();
        $genres = Genre::all();
        return view('home.index', compact('shops', 'areas', 'genres'));
    }
}
