<?php

namespace App\Http\Controllers\DineIn;

use Illuminate\Http\Request;
use App\DineIn\BusinessTobeRegistered;
use Illuminate\Support\Str;

class SortController extends Controller
{
    //
    public function sort($sort)
    {	
    	return redirect()->back()->with('message',$sort);
    }
}
