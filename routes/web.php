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

	Route::get('/locale/{locale}',function($locale){
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


Route::prefix('dinein')->group(function () {
	Route::get('/','DineIn\TableController@table');

	Route::get('/cover','DineIn\CoverController@cover');

	Route::get('/itemmenu','DineIn\CategoryController@category_names');

	Route::get('/locale/{locale}','DineIn\LocaleController@change_language');

	Route::get('/sort/{sort}','DineIn\SortController@sort');

	Route::get('/fooditemdetail/{item_id}','DineIn\FoodItemDetailController@details');

	Route::get('/kitchen','DineIn\KitchenController@display');

	Route::post('/kitchen','DineIn\KitchenController@update');

	Route::get('/billing','DineIn\BillingController@total');

	Route::post('/billing','DineIn\BillingController@change_items');

	Route::get('/ordersentkitchen',function(){
		return view('dinein.ordersentkitchen');
	});

	Route::post('/ordersentkitchen','DineIn\OrderSentKitchen@checkpin');

	Route::get('/selectoption',function(){
		return view('dinein.selectoption');
	});

	Route::post('/selectoption','DineIn\SelectOptionController@checkpin');

	Route::post('/generatebill','DineIn\SelectOptionController@generate_check');

	Route::post('/bill-pin-check','DineIn\SelectOptionController@check_bill_pin');

	Route::post('/customize','DineIn\KitchenController@customize');

	Route::get('/feedback',function(){
		return view('dinein.feedback');
	});

	Route::get('/signature',function(){
		return view('dinein.signature');
	});
	Route::get('/billinganimation',function(){
		return view('dinein.billinganimation');
	});
	Route::get('/processingpayment',function(){
		return view('dinein.processingpayment');
	});
	Route::get('/paymentsuccessfull',function(){
		return view('dinein.paymentsuccessfull');
	});
	Route::get('/billcopy',function(){
		return view('dinein.billcopy');
	});
	Route::get('/thanksfeedback',function(){
		return view('dinein.thanksfeedback');
	});

	Route::post('/saveimage', 'DineIn\BillingController@save');

	Route::post('/sendmail','DineIn\MailController@sendmail');

	Route::get('register_business',function(){
		return view('dinein.register_business');
	});

	Route::post('upload_docs','DineIn\UploadDocsController@upload');

	Route::get('/qrcode','DineIn\QrcodeController@display');

	Route::post('/alertnotification','DineIn\KitchenController@notify');

	Route::get('/notification','DineIn\KitchenController@getnotifications');

	Route::get('/offers-discounts',function(){
		return view('dinein.offers-discounts');
	});
});
