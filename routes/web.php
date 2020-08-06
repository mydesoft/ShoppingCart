<?php

use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'LandingPageController@index')->name('landing-page');


Route::get('/shop', 'ShopController@index')->name('shop.index');

Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');


Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@Update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/save_for_later/{product}', 'CartController@SaveForLater')->name('cart.SaveForLater');
Route::delete('/cart/save_for_later/{product}', 'CartController@DestroySaveForLater')->name('cart.DestroySaveForLater');
Route::post('/cart/move_back_to_cart/{product}', 'CartController@MoveBackToCart')->name('cart.MoveBackToCart');


Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');




Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');




// To Empty A Cart
Route::get('empty', function() {
    Cart::instance('SaveForLater')->destroy();
});








