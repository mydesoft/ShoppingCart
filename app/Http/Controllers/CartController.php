<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;

class CartController extends Controller
{
    public function index(){
    	$MightLike = Product::MightLike()->get();

    	return view('pages.cart')->with('MightLike', $MightLike);
    }



    public function store(Request $request){

    	$duplicates = Cart::search(function($cartItem, $rowId) use ($request){
    		return $cartItem->id === $request->id;
    	});

    	if ($duplicates->isNotEmpty()) {
    		return redirect()->route('cart.index')->with('error', 'Item is Already Present in Cart!');
    	}

    	Cart::add($request->id, $request->name, 1, $request->price)
    			->associate('App\Product');

    	return redirect()->route('cart.index')->with('success', 'Item was Added to Cart!');
    }



    public function Update(Request $request, $id)
    {
      Cart::update($id, $request->quantity);
      // return response()->json(['success' => true]);
      // return $request->all();
    }

    public function destroy($id){
    	Cart::remove($id);

    	return back()->with('error', 'Item has been Removed from Cart!');
    }


    public function SaveForLater($id){
    	$item = Cart::get($id);

    	Cart::remove($id);

    	$duplicates = Cart::instance('SaveForLater')->search(function($cartItem, $rowId) use($id){
    		return $rowId === $id;
       	});

       	if ($duplicates->isNotEmpty()) {
       		return back()->with('error', 'Item Is Already Present In Save For Later');
       	}

    	Cart::instance('SaveForLater')->add($item->id, $item->name, 1, $item->price)
    				 ->associate('App\Product');

    	return back()->with('success', 'Item has been Moved to Saved for Later');			 	
    }
   




   public function DestroySaveForLater($id)
   {
   		Cart::instance('SaveForLater')->remove($id);

   		return back()->with('error', 'Item Has Been Deleted from Save For Later!');
   }


   public function MoveBackToCart($id){
   		$item =	Cart::instance('SaveForLater')->get($id);

   	Cart::instance('SaveForLater')->remove($id);

   	$duplicates = Cart::instance('default')->search(function($cartItem, $rowId) use ($id){
   		return $rowId === $id;
   	});

   	if($duplicates->isNotEmpty()){
   		return back()->with('error', 'Item Is Already In Cart');
   	}

   	Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
   			->associate('App\Product');

   	return back()->with('success', 'Item Has Been Added to Cart');		
   }
}

