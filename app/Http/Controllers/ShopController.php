<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\User;

class ShopController extends Controller
{
    public function index()
    {
        $items = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        $users = User::all();
        return view('home.index', compact('items', 'areas', 'genres', 'users'));
    }
    public function detail(Request $request)
    {
        $items = Shop::all();
        return view('home.detail', compact('items'));
    }
    public function search(Request $request)
    {
        
        $items = Shop::searchShops($request->area_id, $request->genre_id, $request->name);
        
        // where('area_id', $request->area_id)->where('genre_id', $request->genre_id)->orWhere('name', $request->name)->get();
        // dd($items);
        $areas = Area::all();
        $genres = Genre::all();
        return view('home.index', compact('items', 'areas', 'genres'));
    }
}
