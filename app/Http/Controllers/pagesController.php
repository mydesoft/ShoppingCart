<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function ThankYou()
    {
    	return view('pages.thankyou');
    }

    public function Checkout()
    {
    	return view('pages.checkout');
    }

    
      public function Cart()
    {
    	return view('pages.cart');
    }


    
}
