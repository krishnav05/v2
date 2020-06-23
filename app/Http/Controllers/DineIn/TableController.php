<?php

namespace App\Http\Controllers\DineIn;

use App\Http\Controllers\Controller;
use App\DineInModels\DiningTable;
use App\DineInModels\BusinessTobeRegistered;
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
