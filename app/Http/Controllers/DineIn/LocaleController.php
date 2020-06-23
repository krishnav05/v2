<?php

namespace App\Http\Controllers\DineIn;

use Illuminate\Http\Request;
use Session;
use App\DineIn\BusinessTobeRegistered;
use Illuminate\Support\Str;

class LocaleController extends Controller
{
    //
    public function change_language($locale){
    	Session::put('locale', $locale);
    	return redirect()->back();
    }
}
