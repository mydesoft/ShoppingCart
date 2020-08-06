<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;

use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
// use Cartalyst\Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index ()
    {
    	return view('pages.checkout');
    }


    public function store (CheckoutRequest $request)

    {
    	$contents = Cart::content()->map(function($item){
    		return $item->model->slug. ', '.$item->qty;

    	})->values()->toJson();

    	try {

    		$charge = Stripe::charges()->create([

    		'amount' => Cart::total(),
    		'currency' => 'NGN',
    		'source' => $request->stripeToken,
    		'description' => 'order',
    		'receipt_email' => $request->email,
    		'metadata' => [
    			// changes to Order ID when we start using DB
    			'contents' => $contents,
    			'quantity' => Cart::instance('default')->count(),
    		],
    	]);
    		Cart:: instance('default')->destroy();

    		return redirect()->route('confirmation.index')->with('success', 'Your Payment was Successfully Recieved');
    		
    	} 

    	catch (CardErrorException $e) {

    		return back()->witherror('Error', $e->getMessage());
    	}
    	
    }
}

