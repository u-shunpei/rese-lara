<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class StripePaymentsController extends Controller
{
    public function index()
    {
        return view('cash');
//        indexから変更
    }

    public function payment(Request $request)
    {
        try {
            Stripe::setApiKey(env(‘STRIPE_SECRET’));

            $customer = Customer::create(array(
                ’email’ => $request->stripeEmail,
                ‘source’ => $request->stripeToken
            ));

            $charge = Charge::create(array(
                ‘customer’ => $customer->id,
                ‘amount’ => 2000,
                ‘currency’ => ‘jpy’
            ));

            return redirect()->route(‘complete’);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function complete()
    {
        return view(‘complete’);
    }
}
