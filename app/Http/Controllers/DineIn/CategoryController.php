<?php

namespace App\Http\Controllers\DineIn;

use Illuminate\Http\Request;
use App\DineIn\Category;
use App\DineIn\CategoryItem;
use App\DineIn\HindiCategory;
use App\DineIn\ItemDetail;
use App\DineIn\ItemAddon;
use App\DineIn\Kitchen;
use Session;
use DB;
use App\DineIn\HindiCategoryItem;
use App\DineIn\BusinessTobeRegistered;
use Illuminate\Support\Str;
use App\DineIn\RecommendationItem;

class CategoryController extends Controller
{
    //
	public function category_names()
	{	
		if (app()->getLocale() == 'en') {

			$recommended_items = RecommendationItem::all();

			$category_items = CategoryItem::all();
			$category_names = Category::all();
			$item_details = ItemDetail::all();
			$item_addons = ItemAddon::all();
			$table_number = Session::get('table');
			$kitchen_status = Kitchen::where('table_number',$table_number)->where('confirm_status',null)->get();
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

			$total_items = DB::table("dikitchen")->where("table_number","=",$table_number)->where('confirm_status',null)->get()->sum("item_quantity");

			return view('dinein.itemmenu',['category_names'	=> $category_names, 'category_items' => $category_items, 'item_details' => $item_details, 'item_addons' => $item_addons,'kitchen_status' => $kitchen_status,'total_items' => $total_items,'recommended_items' => $recommended_items]);
		}
		elseif (app()->getLocale() == 'hi') {
			$recommended_items = RecommendationItem::all();

			$category_items = CategoryItem::all();
			$category_names = Category::all();
			$hindi_category = HindiCategory::all();
			$hindi_category_items = HindiCategoryItem::all();
			$item_details = ItemDetail::all();
			$item_addons = ItemAddon::all();
			$table_number = Session::get('table');
			$kitchen_status = Kitchen::where('table_number',$table_number)->where('confirm_status',null)->get();
			$total_items = DB::table("dikitchen")->where("table_number","=",$table_number)->where('confirm_status',null)->get()->sum("item_quantity");
			foreach ($category_names as $key) {
    
				foreach ($hindi_category as $value) {
    	
					if ($key['category_id'] == $value['category_id']) {
    			
						$key->category_name = $value->category_name; 
					}

				}
			}

			foreach ($category_items as $key) {
				foreach ($hindi_category_items as $value) {
					if($key['item_id'] == $value['item_id']){
						$key->item_name = $value->item_name;
						$key->item_description = $value->item_description;
					}
				}
			}

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
			$category_names = $category_names->toArray();
			return view('dinein.itemmenu',['category_names'	=> $category_names, 'category_items' => $category_items, 'item_details' => $item_details, 'item_addons' => $item_addons,'kitchen_status' => $kitchen_status,'total_items' => $total_items,'recommended_items' => $recommended_items]);
		}
	}
}
