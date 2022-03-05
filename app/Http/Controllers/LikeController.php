<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Area;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateLikeRequest;

class LikeController extends Controller
{
  public function create(CreateLikeRequest $request)
  {
    $input = $request->validated();
    Like::create([
      'shop_id' => $input['shop_id'],
      'user_id' => Auth::id()
    ]);
    $items = Shop::all();
    $areas = Area::all();
    $genres = Genre::all();
    $users = User::all();
    return redirect('/')->with([
      'items' => $items,
      'areas' => $areas,
      'genred' => $genres,
      'users' => $users
    ]);
    // return view('home.index', compact('input', 'areas', 'genres', 'users', 'items'));
  }
  public function index()
  {
    $items = Shop::all();
    $areas = Area::all();
    $genres = Genre::all();
    $users = User::all();
    return view('home.index', compact('items', 'areas', 'genres', 'users'));
  }
}
