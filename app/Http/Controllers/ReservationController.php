<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{ 
    public function create(Request $request){
        $this->validate($request, Reservation::$rules);
        $reservation = new Reservation;
        $form = $request->all();
        unset($form['_token_']);
        $reservation->fill($form)->save();
        return view('home.done');
    }
    public function index() {
        return view('home.done');
    }
}
