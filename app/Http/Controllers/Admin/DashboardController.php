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
use App\Category;
use App\CategoryItem;
use App\TimeSlots;
use App\DineInModels\Kitchen as DKitchen;
use App\DineInModels\KitchenCustomize as DKitchenCustomize;
use App\DineInModels\KitchenItemAddon as DKitchenItemAddon;
use App\DineInModels\RecommendationItem;
use App\DineInModels\ItemDetail;
use App\DineInModels\ItemAddon;
use DB;
use Session;
use App\DineInModels\DiningTable;
use App\DiningOrders;

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

		$tables = DiningOrders::where('status','occupied')->get(['table']);

		return view('admin.maindashboard',['orders'=>$orders,'tables'=>$tables]);
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

		$tables = DiningOrders::where('status','occupied')->get(['table']);

		return view('admin.order_detail',['orders' => $orders,'user' => $user,'useraddress' => $useraddress,'item' => $item,'itemnames' => $itemnames,'timeslot' => $timeslot,'count'=>$count,'orderid'=>$orderid,'tables'=>$tables]);
	}

	public function tableId(Request $request,$id)
	{	$table_number = $id;
		$orders = Orders::where('completed',null)->get();
		$tables = DiningOrders::where('status','occupied')->get(['table']);

    $order_id = DiningOrders::where('status','occupied')->where('table',$id)->value('id');

    	$kitchen = DKitchen::all()->where('table_number',$id)->where('dining_order_id',$order_id);
        $kitchen_customize = DKitchenCustomize::all();
    	$kitchen_addons = DKitchenItemAddon::all();
    	$category_items = CategoryItem::all();
        $kitchen_total = 0;
        $gst = 0;
        $service_charge = 60;

        foreach ($kitchen as $key) {
            foreach ($category_items as $value) {
                if($key['item_id'] == $value['item_id']){
                    $kitchen_total += ($key['item_quantity'] * $value['item_price']);    
                }
            }
        }
        $gst = $kitchen_total*0.18;
        $total_bill = $kitchen_total + $gst + $service_charge; 
        if($kitchen_total == 0){
            $service_charge = 0;
            $total_bill = 0;
        }
        $count = 1;

		return view('admin.table_details',['kitchen' => $kitchen, 'kitchen_addons' => $kitchen_addons, 'category_items' => $category_items,'kitchen_customize' => $kitchen_customize,'kitchen_total' => $kitchen_total,'gst' => $gst,'service_charge' => $service_charge,'total_bill' => $total_bill,'orders'=>$orders,'tables'=>$tables,'table_number'=>$table_number,'count'=>$count,'order_id'=>$order_id]);
	}

	public function addTableItem(Request $request,$id)
	{	
    Session::put('table',$id);

		$table_number = $id;

		$recommended_items = RecommendationItem::all();

    $order_id = DiningOrders::where('table',$id)->where('status','occupied')->value('id');

			$category_items = CategoryItem::all();
			$category_names = Category::all();
			$item_details = ItemDetail::all();
			$item_addons = ItemAddon::all();
			$kitchen_status = DKitchen::where('table_number',$id)->where('dining_order_id',$order_id)->where('confirm_status',null)->get();
			foreach ($category_items as $key) {
				# code...
				$key['item_quantity'] = '';
				foreach ($kitchen_status as $keys) {
					# code...
					if ($key['item_id'] == $keys['item_id']) {
						# code...
						$key['item_quantity'] = $keys['item_quantity'];
					}
				}

			}

			$total_items = DB::table("dikitchen")->where("table_number","=",$id)->where('confirm_status',null)->get()->sum("item_quantity");

      // check if kitchen empty
      $total_items = DB::table("dikitchen")->where("table_number","=",$table_number)->where('confirm_status',null)->get()->sum("item_quantity");
      $kitchen = DKitchen::where('table_number',$table_number)->where('confirm_status',null)->where('dining_order_id',$order_id)->get();
      $addons = DB::table('dikitchen_customize')->join('dikitchen_item_addons','dikitchen_customize.id','=','dikitchen_item_addons.order_id')->get();
      $kitchen_customize = DKitchenCustomize::all();
      $original_addons = ItemAddon::all();
      $count = '1';

		return view('admin.menu',['category_names'	=> $category_names, 'category_items' => $category_items, 'item_details' => $item_details, 'item_addons' => $item_addons,'kitchen_status' => $kitchen_status,'total_items' => $total_items,'recommended_items' => $recommended_items,'table_number'=>$table_number,'kitchen' => $kitchen,'category_items' => $category_items, 'addons' => $addons,'original_addons' => $original_addons,'count' => $count,'kitchen_customize' => $kitchen_customize]);
	}

  public function updateItems(Request $request)
    { 
      $table_number = Session::get('table');

      $order_id = DiningOrders::where('table',$table_number)->where('status','occupied')->value('id');

      $ifexist = DKitchen::where('item_id',$request->item_id)->where('table_number',$table_number)->where('confirm_status',null)->where('dining_order_id',$order_id)->first();
      if($request->action == 'kitchenadd')
      {
        DKitchenCustomize::where('id',$request->id)->increment('quantity');
        $select_id = DKitchenCustomize::where('id',$request->id)->pluck('order_id');
        DKitchen::where('id',$select_id[0])->where('confirm_status',null)->where('dining_order_id',$order_id)->increment('item_quantity');
        $response = array(
            'status' => 'success',
          );
        return response()->json($response); 
      }
      if($request->action == 'kitchenminus')
      {
        DKitchenCustomize::where('id',$request->id)->decrement('quantity');
        $select_id = DKitchenCustomize::where('id',$request->id)->pluck('order_id');
        DKitchen::where('id',$select_id[0])->where('confirm_status',null)->where('dining_order_id',$order_id)->decrement('item_quantity');
        $delete_status = 'false';
        $check_main = DKitchen::where('id',$select_id[0])->where('confirm_status',null)->where('dining_order_id',$order_id)->pluck('item_quantity');
        if($check_main[0] == 0){
          DKitchen::where('id',$select_id[0])->where('confirm_status',null)->where('dining_order_id',$order_id)->delete();
        }
        $check_delete = DKitchenCustomize::where('id',$request->id)->pluck('quantity');
        if($check_delete[0] == 0){
          DKitchenCustomize::where('id',$request->id)->delete();
          DKitchenItemAddon::where('order_id',$request->id)->delete();
          $delete_status = 'true';
        }
        $response = array(
            'status' => 'success',
            'delete_status' => $delete_status,
          );
        return response()->json($response); 
      }

      if($request->action == 'kitchencustomize')
      {
        $item_id = DKitchenItemAddon::where('order_id',$request->id)->distinct('item_id')->pluck('item_id');
        DKitchenItemAddon::where('order_id',$request->id)->delete();
        foreach ($request->totaldata as $key => $value) {
          $new_addon = new DKitchenItemAddon;
          $new_addon->item_id = $item_id[0];
          $new_addon->addon_name = $key;
          $new_addon->addon_value = $value;
          $new_addon->table_number = $table_number;
          $new_addon->order_id = $request->id;
          $new_addon->business_id = null;
          $new_addon->save();
        }

      }

      if($request->action == 'addon')
      {   
        if($ifexist == null)
        {
          $new_entry = new DKitchen;
          $new_entry->table_number = $table_number;
          $new_entry->item_id = $request->item_id;
          $new_entry->item_quantity = '1';
          $new_entry->business_id = null;
          $new_entry->dining_order_id = DiningOrders::where('table',$table_number)->where('status','occupied')->value('id');
          $new_entry->save();



          $id = DB::table('dikitchen')->where('table_number',$table_number)->where('item_id',$request->item_id)->where('confirm_status',null)->where('dining_order_id',$order_id)->first();

          $new_customize = new DKitchenCustomize;
          $new_customize->order_id = $id->id;
          $new_customize->quantity = '1';
          $new_customize->business_id = null;
          $new_customize->save();
        }
        else{
          $id = DB::table('dikitchen')->where('table_number',$table_number)->where('item_id',$request->item_id)->where('confirm_status',null)->where('dining_order_id',$order_id)->first();
          DKitchen::where('table_number',$table_number)->where('confirm_status',null)->where('item_id',$request->item_id)->where('dining_order_id',$order_id)->increment('item_quantity');
          $new_customize = new DKitchenCustomize;
          $new_customize->order_id = $id->id;
          $new_customize->quantity = '1';
          $new_customize->business_id = null;
          $new_customize->save();
        }

        $id = DB::table('dikitchen_customize')->orderBy('id','DESC')->first();

        foreach ($request->totaldata as $key => $value) {
          $new_addon = new DKitchenItemAddon;
          $new_addon->item_id = $request->item_id;
          $new_addon->addon_name = $key;
          $new_addon->addon_value = $value;
          $new_addon->table_number = $table_number;
          $new_addon->order_id = $id->id;
          $new_addon->business_id = null;
          $new_addon->save();
        }
      }

      $total_items = DB::table("dikitchen")->where("table_number","=",$table_number)->where('confirm_status',null)->where('dining_order_id',$order_id)->get()->sum("item_quantity");
      $response = array(
        'status' => 'success',
        'msg' => $total_items,
      );
      return response()->json($response); 
    }

    public function customize(Request $request){
      $table_number = Session::get('table');

      $order_id = DiningOrders::where('table',$table_number)->where('status','occupied')->value('id');

      if($request->action == 'add'){
        $update = DKitchenCustomize::where('id',$request->item_id)->first();
        $update->increment('quantity');
        $get_id = DKitchenCustomize::where('id',$request->item_id)->pluck('order_id');
        $sum = DB::table('dikitchen_customize')->where('order_id',$get_id[0])->get()->sum('quantity');
        DB::table('dikitchen')->where('id',$get_id[0])->where('confirm_status',null)->where('dining_order_id',$order_id)->update(['item_quantity' => $sum]);
        $total_items = DB::table("dikitchen")->where("table_number","=",$table_number)->where('confirm_status',null)->where('dining_order_id',$order_id)->get()->sum("item_quantity");
        $check_main_item = DKitchen::where('table_number',$table_number)->where('confirm_status',null)->where('id',$get_id[0])->where('dining_order_id',$order_id)->pluck('item_quantity');
        $item_id_to_change = DKitchen::where('table_number',$table_number)->where('confirm_status',null)->where('id',$get_id[0])->where('dining_order_id',$order_id)->pluck('item_id');
        $response = array(
        'status' => 'success',
        'total_items' => $total_items,
        'item_id' => $item_id_to_change[0],
        'item_quantity' => $check_main_item[0],
      );
        return response()->json($response); 
      }

      elseif ($request->action == 'minus') {
        $update = DKitchenCustomize::where('id',$request->item_id)->first();
        $update->decrement('quantity');
        $get_id = DKitchenCustomize::where('id',$request->item_id)->pluck('order_id');
        $sum = DB::table('dikitchen_customize')->where('order_id',$get_id[0])->get()->sum('quantity');
        DB::table('dikitchen')->where('id',$get_id[0])->where('confirm_status',null)->where('dining_order_id',$order_id)->update(['item_quantity' => $sum]);
        $update = DKitchenCustomize::where('id',$request->item_id)->first();
        $total_items = DB::table("dikitchen")->where("table_number","=",$table_number)->where('confirm_status',null)->where('dining_order_id',$order_id)->get()->sum("item_quantity");
        $check_main_item = DKitchen::where('table_number',$table_number)->where('confirm_status',null)->where('id',$get_id[0])->where('dining_order_id',$order_id)->pluck('item_quantity');
        $item_id_to_change = DKitchen::where('table_number',$table_number)->where('confirm_status',null)->where('id',$get_id[0])->where('dining_order_id',$order_id)->pluck('item_id');
        if($update->quantity == '0'){
          DB::table('dikitchen_customize')->where('order_id',$update->id)->delete();
          $update->delete();
          DB::table('dikitchen_item_addons')->where('order_id',$request->item_id)->delete();
          $check_main_item = DKitchen::where('table_number',$table_number)->where('confirm_status',null)->where('id',$get_id[0])->where('dining_order_id',$order_id)->pluck('item_quantity');
          $item_id_to_change = DKitchen::where('table_number',$table_number)->where('confirm_status',null)->where('id',$get_id[0])->where('dining_order_id',$order_id)->pluck('item_id');
          if($check_main_item[0] == 0){
            DB::table('dikitchen')->where('confirm_status',null)->where('id',$get_id[0])->where('dining_order_id',$order_id)->delete();
          }
          $response = array(
            'delete_status' => 'success',
            'total_items' => $total_items,
            'item_id' => $item_id_to_change[0],
            'item_quantity' => $check_main_item[0],
          );
        }
        else{
          $response = array(
            'delete_status' => 'no',
            'total_items' => $total_items,
            'item_id' => $item_id_to_change[0],
            'item_quantity' => $check_main_item[0],
          );
        }
        return response()->json($response); 
      }
      else{
        $table_number = Session::get('table');
      $item_details = CategoryItem::where('item_id',$request->item_id)->get();
      $kitchen_details = DKitchen::where(['item_id'=> $request->item_id,'table_number' => $table_number,'confirm_status' => null])->where('dining_order_id',$order_id)->get();
      $kitchen_custom = DKitchenCustomize::where('order_id',$kitchen_details[0]->id)->get();
      $kitchen_addon = DB::table('dikitchen_customize')->join('dikitchen_item_addons','dikitchen_customize.id','=','dikitchen_item_addons.order_id')->get();
      $total_items = DB::table("dikitchen")->where('confirm_status',null)->where("table_number","=",$table_number)->where('dining_order_id',$order_id)->get()->sum("item_quantity");
      $response = array(
        'status' => 'success',
        'kitchen_custom' => $kitchen_custom,
        'kitchen_addon' => $kitchen_addon,
        'item_details' => $item_details,
        'total_items' => $total_items,
      );
      return response()->json($response); 
      }
    }

    public function setTable()
    {
      $tables = DiningTable::where('table_status','Empty')->get();

      return view('admin.table',['tables'=>$tables]);
    }

    public function set($no)
    {
      Session::put('table',$no);
      DiningTable::where('table_no',$no)->update(['table_status'=>'Occupied']);
      $new = new DiningOrders;
      $new->table = $no;
      $new->save();

      return redirect('/admin/menu/'.$no);
    }

    public function confirmItems($no)
    {
      $order_id = DiningOrders::where('table',$no)->where('status','occupied')->value('id');
      DKitchen::where('table_number',$no)->where('dining_order_id',$order_id)->update(['confirm_status' => 'yes']);

      return redirect('/admin/maindashboard');
    }

    public function refreshTable(Request $request)
    {
      $table_number = $request->tbno;
    $orders = Orders::where('completed',null)->get();

    $order_id = DiningOrders::where('table',$table_number)->where('status','occupied')->value('id');
    $tables = DKitchen::distinct()->get(['table_number']);

      $kitchen = DKitchen::all()->where('table_number',$table_number)->where('confirm_status',null)->where('dining_order_id',$order_id);
        $kitchen_customize = DKitchenCustomize::all();
      $addons = DKitchenItemAddon::all();
      $category_items = CategoryItem::all();
        $kitchen_total = 0;
        $gst = 0;
        $service_charge = 60;

        foreach ($kitchen as $key) {
            foreach ($category_items as $value) {
                if($key['item_id'] == $value['item_id']){
                    $kitchen_total += ($key['item_quantity'] * $value['item_price']);    
                }
            }
        }
        $gst = $kitchen_total*0.18;
        $total_bill = $kitchen_total + $gst + $service_charge; 
        if($kitchen_total == 0){
            $service_charge = 0;
            $total_bill = 0;
        }
        $count = 1;


    $view = view('admin.tablesection',['kitchen' => $kitchen, 'addons' => $addons, 'category_items' => $category_items,'kitchen_customize' => $kitchen_customize,'kitchen_total' => $kitchen_total,'gst' => $gst,'service_charge' => $service_charge,'total_bill' => $total_bill,'orders'=>$orders,'tables'=>$tables,'table_number'=>$table_number,'count'=>$count])->render();

    return $view;
    }

    public function getKot($no)
    { $table_number = $no;

      $order_id = DiningOrders::where('table',$no)->where('status','occupied')->value('id');
      $kitchen = DKitchen::all()->where('table_number',$no)->where('kot_status',null)->where('dining_order_id',$order_id);
        $kitchen_customize = DKitchenCustomize::all();
      $addons = DKitchenItemAddon::all();
      $category_items = CategoryItem::all(); 
      $count = 1;

      return view('admin.kot',['kitchen'=>$kitchen,'kitchen_customize'=>$kitchen_customize,'addons'=>$addons,'category_items'=>$category_items,'count'=>$count,'table_number'=>$table_number,'order_id'=>$order_id]);
    }

    public function getInvoice($no)
    {
      $table_number = $no;
    $orders = Orders::where('completed',null)->get();
    $tables = DiningOrders::where('status','occupied')->get(['table']);

    $order_id = $no;

      $kitchen = DKitchen::all()->where('dining_order_id',$order_id);
        $kitchen_customize = DKitchenCustomize::all();
      $kitchen_addons = DKitchenItemAddon::all();
      $category_items = CategoryItem::all();
        $kitchen_total = 0;
        $gst = 0;
        $service_charge = 60;

        foreach ($kitchen as $key) {
            foreach ($category_items as $value) {
                if($key['item_id'] == $value['item_id']){
                    $kitchen_total += ($key['item_quantity'] * $value['item_price']);    
                }
            }
        }
        $gst = $kitchen_total*0.18;
        $total_bill = $kitchen_total + $gst + $service_charge; 
        if($kitchen_total == 0){
            $service_charge = 0;
            $total_bill = 0;
        }
        $count = 1;

    return view('admin.invoice',['kitchen' => $kitchen, 'kitchen_addons' => $kitchen_addons, 'category_items' => $category_items,'kitchen_customize' => $kitchen_customize,'kitchen_total' => $kitchen_total,'gst' => $gst,'service_charge' => $service_charge,'total_bill' => $total_bill,'orders'=>$orders,'tables'=>$tables,'table_number'=>$table_number,'count'=>$count,'order_id'=>$order_id]);
    }

    public function markComplete(Request $request)
    {
      DiningOrders::where('id',$request->order)->update(['status'=>'completed','bill'=>$request->bill]);

      $response = array(
            'status' => 'success',
          );
        
        return response()->json($response); 

    }
}
