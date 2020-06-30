<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kitchen;
use App\User;
use App\UserAddress;
use App\Orders;
use Auth;
use Bitfumes\Multiauth\Model\Admin;
use App\CategoryItem;
use App\TimeSlots;

class DashboardController extends Controller
{
    //
	public function fetch()
	{	
		$orders = Orders::where('completed',null)->get();
		$user = User::all();
		$useraddress = UserAddress::all();
		$item = Kitchen::all();
		$itemnames = CategoryItem::all();
		$timeslot = TimeSlots::all();
		$count = 1;

		return view('admin.dashboardd',['orders' => $orders,'user' => $user,'useraddress' => $useraddress,'item' => $item,'itemnames' => $itemnames,'timeslot' => $timeslot,'count'=>$count]);
	}

	public function update($id,$status)
	{
		if($status == 'accept')
		{
			Orders::where('id',$id)->update(['order_status' => 'Accepted']);
		}
		else if($status == 'preparing')
		{
			Orders::where('id',$id)->update(['order_status' => 'Preparing']);
		}
		else if($status == 'out-deliv')
		{
			Orders::where('id',$id)->update(['order_status' => 'Out For Delivery']);
		}
		else if($status == 'delivered')
		{
			Orders::where('id',$id)->update(['order_status' => 'Delivered','completed' => 1]);
		}

		return redirect()->back();
	}

	public function profile()
	{
		$check = Auth::guard('admin')->user()->license_id;
    	if($check == null)
    	{
    		return redirect()->route('license');
    	}
		return view('admin.profile');
	}

	public function past_orders()
	{	
		$orders = Orders::where('completed','1')->get();
		$user = User::all();
		$useraddress = UserAddress::all();
		$item = Kitchen::all();
		$itemnames = CategoryItem::all();
		$timeslot = TimeSlots::all();
		$count = 1;

		return view('admin.past_orders',['orders' => $orders,'user' => $user,'useraddress' => $useraddress,'item' => $item,'itemnames' => $itemnames,'timeslot' => $timeslot,'count'=>$count]);
	}

	public function maindashboard()
	{	
		$orders = Orders::where('completed',null)->get();

		return view('admin.maindashboard',['orders'=>$orders]);
	}

	public function settings()
	{	
		
		$tax = Auth::guard('admin')->user()->tax_applicable;
		return view('admin.settings',['tax'=>$tax]);
	}

	public function update_settings(Request $request)
	{	
		Auth::guard('admin')->user()->update(['tax_applicable' => $request->tax]);

		$tax = Auth::guard('admin')->user()->tax_applicable;
		return view('admin.settings',['tax'=>$tax]);
	}

	public function refresh(Request $request)
	{
		$orders = Orders::where('completed',null)->get();
		$user = User::all();
		$useraddress = UserAddress::all();
		$item = Kitchen::all();
		$itemnames = CategoryItem::all();
		$timeslot = TimeSlots::all();
		$count = 1; 
		$view = view('admin.dashboardd',['orders' => $orders,'user' => $user,'useraddress' => $useraddress,'item' => $item,'itemnames' => $itemnames,'timeslot' => $timeslot,'count'=>$count])->renderSections();
		// $sections = $view->renderSections();
		return $view['content'];
	}

	public function orderId(Request $request,$id)
	{
		$orderid = $id;
		$orders = Orders::where('completed',null)->get();
		$user = User::all();
		$useraddress = UserAddress::all();
		$item = Kitchen::all();
		$itemnames = CategoryItem::all();
		$timeslot = TimeSlots::all();
		$count = 1;

		return view('admin.order_detail',['orders' => $orders,'user' => $user,'useraddress' => $useraddress,'item' => $item,'itemnames' => $itemnames,'timeslot' => $timeslot,'count'=>$count,'orderid'=>$orderid]);
	}

}
