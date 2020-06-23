<?php

namespace App\Http\Controllers\DineIn;

use App\Http\Controllers\Controller;
use App\DineInModels\DiningTable;
use App\DineInModels\BusinessTobeRegistered;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    //
    public function display()
    {	

    	$total_tables = DiningTable::all();

    	return view('dinein.qr_code',['total_tables' => $total_tables]);
    }
}
