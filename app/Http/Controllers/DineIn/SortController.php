<?php

namespace App\Http\Controllers\DineIn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DineInModels\BusinessTobeRegistered;
use Illuminate\Support\Str;

class SortController extends Controller
{
    //
    public function sort($sort)
    {	
    	return redirect()->back()->with('message',$sort);
    }
}
