<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DineInModels\Feedback;

class FeedbackController extends Controller
{
	public function index()
	{	$feedback = Feedback::all();
		return view('admin.feedback',['feedback'=>$feedback]);
	}
}
