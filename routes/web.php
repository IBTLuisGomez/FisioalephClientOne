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

Route::get('/', function () {
    return view('home');
});
Route::resource('/tienda','ProductController');
Route::post('/tienda/manage_cart','ProductController@AJAX_manageCart');
Route::post('/quicklogin','LoginController@quickLogin');
Route::get('/checkout','ProductController@checkout');
Route::post('/payment_processing','OpenPayController@process');

Route::get('/test',function(){
	return view("test_paypal");
});

    Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');