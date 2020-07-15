<?php

namespace App\Http\Controllers\DineIn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DineInModels\Helper;
use App\DineInModels\HelperTableManager;
use Session;
use App\DineInModels\DiningTable;
use App\DineInModels\BusinessTobeRegistered;
use Illuminate\Support\Str;
use App\DiningOrders;

class SelectOptionController extends Controller
{
    //
    public function checkpin(Request $request)
    {   
        $data = $request->totaldata;

        if ($data['status'] == 'Occupied')
        {
            $pin = $data['pin1'].$data['pin2'].$data['pin3'].$data['pin4'];
            $ifexist = Helper::where('helper_code',$pin)->first();
            if($ifexist == null)
            {
                // return redirect()->back()->with('error','wrong pin');
                return response()->json(['status'=>'wrong pin','message'=>'You have entered wrong pin']);
            }
            else
                {   $tablemanager = new HelperTableManager;
                    $tablemanager->helper_code = $pin;
                    $tablemanager->table_number = $data['tableId'];
                    $tablemanager->business_id = null;
                    $tablemanager->save();

                    Session::put('table', $data['tableId']);

            // return view('selectoption');
                    return response()->json(['status'=>'success','url'=>'selectoption']);
        } 
        }
        else
        {
            $pin = $data['pin1'].$data['pin2'].$data['pin3'].$data['pin4'];
            $ifexist = Helper::where('helper_code',$pin)->first();
            if($ifexist == null)
            {
                return response()->json(['status'=>'wrong pin','message'=>'You have entered wrong pin']);
            }
            else
                {   $tablemanager = new HelperTableManager;
                    $tablemanager->helper_code = $pin;
                    $tablemanager->table_number = $data['tableId'];
                    $tablemanager->business_id = null;
                    $tablemanager->save();

                    Session::put('table', $data['tableId']);
                    DiningTable::where('table_no',$data['tableId'])->update(array('table_status' => 'Occupied' ));

                    $new = new DiningOrders;
                    $new->table = $data['tableId'];
                    $new->save();
                    
            return response()->json(['status'=>'success','url'=>'cover']);
        } 
            
        }
    	
    }

    public function generate_check(Request $request)
    {   
        $data = $request->totaldata;
        $pin = $data['pin1'].$data['pin2'].$data['pin3'].$data['pin4'];
        $table_number = Session::get('table');
        $ifexist = HelperTableManager::where('helper_code',$pin)->where('table_number',$table_number)->first();
        if($ifexist == null)
            {
                // return redirect()->back()->with('error','wrong pin');
                return response()->json(['status'=>'wrong pin','message'=>'You have entered wrong pin']);
            }
            else
                { 
            // return redirect('billinganimation');
                    return response()->json(['status'=>'success','url'=>'billinganimation']);
        }
    }

    public function check_bill_pin(Request $request)
    {   
        $pin = $request->totaldata['pin1'].$request->totaldata['pin2'].$request->totaldata['pin3'].$request->totaldata['pin4'];
        $table_number = Session::get('table');
        $ifexist = HelperTableManager::where('helper_code',$pin)->where('table_number',$table_number)->first();
        if($ifexist == null)
        {
            return response()->json(['pin_status'=>'wrong pin','message'=>'You have entered wrong pin']);
        }
        else
        { 
            $response = array(
                'pin_status' => 'correct',
            );
            return response()->json($response);
        }
    }
}
