<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\CreateReservationRequest;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(CreateReservationRequest $request)
    {
        $input = $request->validated();
        //$input['user_id'] = Auth::id();//ログインしてるユーザーのID取得

        Reservation::create([
            'shop_id' => $input['shop_id'],
            'user_id' => Auth::id(),
            'date' => $input['date'],
            'time' => $input['time'],
            'num_of_users' => $input['num_of_users']
        ]);

        // dd($input);
        // // $reservation = new Reservation;
        // $form = $request->all();
        // unset($form['_token_']);
        // $reservation->fill($form)->save();
        return view('home.done', ['input' => $input]);
    }
    public function index()
    {
        return view('home.done');
    }
    public function back()
    {
        return view('home.detail');
    }
}
