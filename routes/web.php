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
Auth::routes();
Route::get('/', "HomeController@index");

Route::resource('/servicios_en_salud','ServicesController');
Route::resource('/tienda','ProductController');

Route::resource('/contacto','ContactController');
Route::resource('/store','ProductController');
Route::get('/admin/non_categorized_products','ProductController@nonCategorizedProducts');
Route::get('/ajax_get_appoinments_from_date/{date?}','AppoinmentController@ajax_get_appoinments_from_date');
Route::resource('/appoinments','AppoinmentController');
Route::resource('/orders','OrderController');
Route::post('/tienda/manage_cart','ProductController@AJAX_manageCart');
// Route::post('/quicklogin','LoginController@quickLogin');
Route::get('/checkout','ProductController@checkout');
Route::get('/category/{viewcategory}','ProductCategoriesController@viewCategory');
Route::get('/helper/ajax_get_municipalities_id_by_name/{municipality_id}','CheckoutController@ajax_get_municipality_id_by_name');
Route::get('/helper/ajax_get_municipalities_from_state_id/{municipality_id}','CheckoutController@ajax_get_municipalities_by_state_id');
Route::get('/helper/ajax_get_estate_id_by_name/{state_name}','CheckoutController@ajax_get_estate_id_by_name');
// Route::get('/store/{viewcategory?}','ProductCategoriesController@index')->name("store.index");
Route::post('/charge', 'OpenPayController@store');
Route::get('/create_appointment_for_product/{product_id}', 'AppoinmentController@create_appointment_for_product');
Route::post('/revision', 'OpenPayController@revision');
Route::get('/ajax_get_remaining_times_from_date/{date?}', 'AppoinmentController@ajax_get_remaining_times_from_date');
//middleware de pacientes
Route::get('/therapy/list_all','ClincalRecordController@index');

Route::get('/test',function(){
	return view("test_paypal");
});



Route::get('/home', 'HomeController@index')->name('home');