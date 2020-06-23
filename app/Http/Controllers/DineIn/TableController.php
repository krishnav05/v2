<?php

namespace App\Http\Controllers\DineIn;
use App\DineIn\DiningTable;
use App\DineIn\BusinessTobeRegistered;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class TableController extends Controller
{
    //
    public function table()
    {   
    	$total_tables = DiningTable::all();
    	return view('dinein.selecttable',['total_tables' => $total_tables]);
    }
}
