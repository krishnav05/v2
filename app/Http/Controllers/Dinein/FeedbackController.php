<?php

namespace App\Http\Controllers\Dinein;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function post(Request $request)
    {
    	if($request->action == 'likefood')
    	{
    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
    	if($request->action == 'service')
    	{
    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
    	if($request->action == 'staff')
    	{
    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
    	if($request->action == 'speed')
    	{
    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
    	if($request->action == 'clean')
    	{
    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
    	if($request->action == 'exp')
    	{
    		$response = array(
                    'status' => 'done',
                );

            return response()->json($response);
    	}
    }
}
