<?php

namespace App\Http\Controllers\DineIn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\DineInModels\BusinessTobeRegistered;
use Illuminate\Support\Str;

class LocaleController extends Controller
{
    //
    public function change_language($locale){
    	Session::put('locale', $locale);
    	return redirect()->back();
    }
}
