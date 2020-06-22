<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignManagerController extends Controller
{
    public function index()
    {
    	return view('admin.campaign_manager');
    }
}
