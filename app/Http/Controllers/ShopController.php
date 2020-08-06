<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ShopController extends Controller
{
    public function index()
    {
    	$products = Product::inRandomOrder()->take(12)->get();

    	return view('pages.shop')->with('products', $products);
    }

    public function show ($slug)
    {
    	$product = Product:: where('slug', $slug)->firstOrFail();

    	$MightLike = Product:: where('slug', '!=', $slug)->MightLike()->get();

    	return view('pages.show')->with([

    		'product' => $product,
    		'MightLike' => $MightLike,
    	]);
    }
}
