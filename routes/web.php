<?php

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

use App\Http\Controllers\OrderController;

Route::get('/','HomeController@index')->name('home');

Route::get('/products/{tag}','ProductController@index');

Route::get('/products&categories/{tag}','ProductController@show');

Route::get('/product/{id}','ProductController@showProduct');

Route::post('/addToCart','CartController@store');

Route::get('/userCart','CartController@index');

Route::post('/removeFromCart','CartController@delete');

Route::get('/register','RegistrationController@create');

Route::post('/register','RegistrationController@store');

Route::get('login',[ 'as' => 'login', 'uses' => 'SessionsController@create']);

Route::post('/login','SessionsController@store');

Route::get('/logout','SessionsController@destroy');

Route::get('/resetPassword','ResetPasswordController@index');

Route::post('/resetPassword','ResetPasswordController@reset');

Route::get('/resetPasswordUrl/{tokenemail}','ResetPasswordController@verify');

Route::post('/changePassword/{email}','RegistrationController@changePassword');

Route::get('/saveAddress','AddressController@index');

Route::post('/saveAddress','AddressController@saveAddress');

Route::get('/paymentMethod','OrderController@checkAddress');

Route::post('/bookOrder','OrderController@store');

Route::get('/orderslist','OrderController@index');

Route::get('/order/{id}','OrderController@show');

Route::get('/cancelOrder/{id}','OrderController@cancelOrder');

Route::get('/profile','UserController@index');

Route::get('/about',function(){
    return view('pages.about');
});

Route::get('/contact',function(){
    return view('pages.contact');
});
