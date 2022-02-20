<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;

class ShopController extends Controller
{
    public function index(){
        $items = Shop::all();
        $books = Reservation::all();
        return view('home.index', compact('items', 'books'));
    }
    public function detail(Request $request){
        $items = Shop::all();
        $books = Reservation::all();
        return view('home.detail', compact('items', 'books'));
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
