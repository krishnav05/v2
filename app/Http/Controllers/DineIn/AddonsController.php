<?php

namespace App\Http\Controllers\DineIn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddonsController extends Controller
{
    //
    public function get(Request $request)
    {
    	return response()->json(['response' => 'This is get method']);	
    }
}
