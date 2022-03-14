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
    return back();
  }
  public function delete(Request $request)
  {
      $like = Like::where('shop_id', $request->shop_id)->where('user_id', Auth::id())->delete();
      return back()->with('like');
  }
}
