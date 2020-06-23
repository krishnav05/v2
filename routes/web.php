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


Route::prefix('dinein')->group(function () {
	Route::get('/','TableController@table');

	Route::get('/cover','CoverController@cover');

	Route::get('/itemmenu','CategoryController@category_names');

	Route::get('/locale/{locale}','LocaleController@change_language');

	Route::get('/sort/{sort}','SortController@sort');

	Route::get('/fooditemdetail/{item_id}','FoodItemDetailController@details');

	Route::get('/kitchen','KitchenController@display');

	Route::post('/kitchen','KitchenController@update');

	Route::get('/billing','BillingController@total');

	Route::post('/billing','BillingController@change_items');

	Route::get('/ordersentkitchen',function(){
		return view('ordersentkitchen');
	});

	Route::post('/ordersentkitchen','OrderSentKitchen@checkpin');

	Route::get('/selectoption',function(){
		return view('selectoption');
	});

	Route::post('/selectoption','SelectOptionController@checkpin');

	Route::post('/generatebill','SelectOptionController@generate_check');

	Route::post('/bill-pin-check','SelectOptionController@check_bill_pin');

	Route::post('/customize','KitchenController@customize');

	Route::get('/feedback',function(){
		return view('feedback');
	});

	Route::get('/signature',function(){
		return view('signature');
	});
	Route::get('/billinganimation',function(){
		return view('billinganimation');
	});
	Route::get('/processingpayment',function(){
		return view('processingpayment');
	});
	Route::get('/paymentsuccessfull',function(){
		return view('paymentsuccessfull');
	});
	Route::get('/billcopy',function(){
		return view('billcopy');
	});
	Route::get('/thanksfeedback',function(){
		return view('thanksfeedback');
	});

	Route::post('/saveimage', 'BillingController@save');

	Route::post('/sendmail','MailController@sendmail');

	Route::get('register_business',function(){
		return view('register_business');
	});

	Route::post('upload_docs','UploadDocsController@upload');

	Route::get('/qrcode','QrcodeController@display');

	Route::post('/alertnotification','KitchenController@notify');

	Route::get('/notification','KitchenController@getnotifications');

	Route::get('/offers-discounts',function(){
		return view('offers-discounts');
	});
});
