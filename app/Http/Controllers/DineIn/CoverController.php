<?php

namespace App\Http\Controllers\DineIn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DineInModels\BusinessTobeRegistered;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Session;


class CoverController extends Controller
{
    //
    public function cover(Request $request){
        
        if ($request->has('q')) {
    //
            Session::put('table', $request->input('q'));
            Session::put('qrc','1');
}

    	return view('dinein.cover');
    }
}
