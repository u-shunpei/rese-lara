<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    public function index(){
        $items = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        return view('home.index', compact('items', 'areas', 'genres'));
    }
    public function detail(Request $request){
        $items = Shop::all();
        return view('home.detail', compact('items'));
    }
    public function search(Request $request) {
        $items = Shop::where('area_id', $request->area_id)->where('genre_id', $request->genre_id)->get();
        return view('home.index', compact('items'));
    }
    //public function index()
    //{
        //$shops = Shop::all();
        //return view('home.index', ['shops' => $shops]);
    //}
    //public function detail(Request $request){
        //$items = Shop::find(id)->get();
        //return view('home.detail');
    //}
}
