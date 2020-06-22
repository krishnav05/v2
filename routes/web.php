<?php

use Illuminate\Support\Facades\Route;

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
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//test email function
Route::get('/send',function(){
	\Mail::to('aman@gmail.com')->send(new \App\Mail\TestMail());
});

Route::prefix('delivery')->group(function () {
	Route::get('menu','Delivery\MenuController@getItems');

	Route::post('add_item','Delivery\MenuController@addItem')->name('add.item');

	// Route::get('offers',function(){
	// 	return view('offers');
	// });

	Route::get('kitchen','Delivery\KitchenController@getItems')->name('kitchen');

	Route::post('kitchen_update','Delivery\KitchenController@updateItems');

	Route::get('address','Delivery\AddressController@getDetails')->middleware('auth');

	// route for make payment request using post method
	Route::post('dopayment', 'Delivery\RazorpayController@dopayment')->name('dopayment')->middleware('auth');

	//add address
	Route::post('add_address','Delivery\AddressController@add')->name('add.address')->middleware('auth');

	Route::get('locale/{locale}',function($locale){
		Session::put('locale', $locale);
		return redirect()->back();
	});

	Route::get('ordersentkitchen','Delivery\KitchenController@ordersentkitchen')->middleware('auth');

	Route::post('confirm_items','Delivery\KitchenController@confirm');

	Route::post('check_status','Delivery\KitchenController@check_status');

	Route::post('checkminorder','Delivery\KitchenController@checkminimumprice');

	Route::get('verifyotp',function(){
		return view('auth.otp');
	});

	Route::get('otplogin',function(){
		return view('auth.otplogin');
	});

	Route::post('sendotptomobile','Delivery\OtpController@sendotp');

	Route::post('verify-otp','Delivery\OtpController@verifyotp');
});