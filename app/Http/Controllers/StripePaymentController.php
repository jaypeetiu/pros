<?php

   

namespace App\Http\Controllers;

   

use Illuminate\Http\Request;

use Session;

use Stripe;

   

class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe()

    {

        return view('stripe');

    }

  

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('sk_test_51HQcpMKq0UQmfTnQNMxFuHDBuWJQWa8swHPECPuBB37FvcGOW6iV7bNPcHKdPBJ1HbI7EFRihKncFV5SWHxLNlLi00fXeBCMiS'));

        Stripe\Charge::create ([

                "amount" => 100 * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from JProDev.com." 

        ]);

  

        Session::flash('success', 'Payment successful!');

          

        return back();

    }

}