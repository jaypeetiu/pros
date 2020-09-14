<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class CheckoutController extends Controller
{

    public function charge(Request $request)
    {
        try {
    		Stripe::setApiKey(env('STRIPE_SECRET'));

    		$customer = Customer::create(array(
        		'email' => $request->stripeEmail,
        		'source' => $request->stripeToken
    		));

    		$charge = Charge::create(array(
    		    'customer' => $customer->id,
    		    'amount' => 1999,
        		'currency' => 'usd'
    		));

    		return 'Charge successful!';
		}catch (\Exception $ex) {
    		return $ex->getMessage();
		}
    }

}