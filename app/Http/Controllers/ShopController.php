<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        return view('home.index', compact('shops', 'areas', 'genres'));
    }

    public function detail($shop_id)
    {
        $shop = Shop::find($shop_id);
        if (is_null($shop)) {
            //エラーですよ
            return 'エラー';
        }
        return view('home.detail', compact('shop'));
    }

    public function search(Request $request)
    {

        $shops = Shop::searchShops($request->area_id, $request->genre_id, $request->name);
        $areas = Area::all();
        $genres = Genre::all();
        return view('home.index', compact('shops', 'areas', 'genres'));
    }
}
