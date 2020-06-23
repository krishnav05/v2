<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Bitfumes\Multiauth\Model\Admin;
use App\Orders;
use App\Kitchen;
use App\CategoryItem;

class AnalyticsController extends Controller
{
    //
	public function index()
	{	
    	$total_orders = Orders::count();
    	$total_revenue = Orders::sum('amount');
    	$total_revenue /= 100;

    	$analytics = Kitchen::groupBy('item_id')->selectRaw('sum(item_quantity) as sum,item_id')->orderBy('sum','DESC')->take(5)->get('sum','item_id');

    	$category_items = CategoryItem::all();
    	$count = 1;
		return view('admin.analytics',['total_orders'=>$total_orders,'total_revenue'=>$total_revenue,'analytics'=>$analytics,'category_items'=>$category_items,'count'=>$count]);
	}

}
