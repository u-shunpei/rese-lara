<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
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
    return view('home.index', ['input' => $input]);
  }
}
