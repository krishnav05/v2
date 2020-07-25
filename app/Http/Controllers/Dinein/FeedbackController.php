<?php

namespace App\Http\Controllers\Dinein;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DineInModels\Feedback;
use Session;
use App\DiningOrders;

class FeedbackController extends Controller
{
    public function post(Request $request)
    {   $table_number = Session::get('table');

    	if($request->action == 'likefood')
    	{   
            $latest = DiningOrders::latest()->where('table',$table_number)->first()->value('id');

            $new = new Feedback;
            $new->food = $request->attr;
            $new->table_number = $table_number;
            $new->table_order_id = $latest;
            $new->save();

    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
    	if($request->action == 'service')
    	{  
            Feedback::latest()->where('table_number',$table_number)->update(['service'=>$request->attr]);

    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
    	if($request->action == 'staff')
    	{  
            Feedback::latest()->where('table_number',$table_number)->update(['staff'=>$request->attr]);

    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
    	if($request->action == 'speed')
    	{
            Feedback::latest()->where('table_number',$table_number)->update(['speed'=>$request->attr]);

    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
    	if($request->action == 'clean')
    	{
            Feedback::latest()->where('table_number',$table_number)->update(['clean'=>$request->attr]);

    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
    	if($request->action == 'exp')
    	{
            Feedback::latest()->where('table_number',$table_number)->update(['dineexp'=>$request->attr]);

    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
        $response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    }
}
