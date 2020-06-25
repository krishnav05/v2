<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\EmployeeLeaves;
use Auth;

class ErpController extends Controller
{
    public function index()
    {
    	return view('admin.erp');
    }

    public function add(Request $request)
    {   
        $validatedData = $request->validate([
            'name'  => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required',
            'age'  => 'required',
            'gender'  => 'required',
            'shift_timings'  => 'required',
            'designation'  => 'required',
            'employer_notes'  => 'required',
            'emergency_name'  => 'required',
            'emergency_phone'  => 'required',
        ]);

    	$new = new Employee;
    	$new->name = $request->name;
    	$new->age = $request->age;
    	$new->gender = $request->gender;
    	$new->email = $request->email;
    	$new->phone = $request->phone;
    	$new->shift_timings = $request->shift_timings;
    	$new->designation = $request->designation;
    	$new->employer_notes = $request->employer_notes;
    	$new->emergency_name = $request->emergency_name;
    	$new->emergency_phone = $request->emergency_phone;
    	$new->save();

    	return redirect()->back();
    }

    public function fetch()
    {
    	$employees = Employee::all();

    	return view('admin.employee',['employees'=>$employees]);
    }

    public function details($id)
    {
    	$employee = Employee::where('id',$id)->get();

    	$leaves = EmployeeLeaves::where('employee_id',$id)->get();

    	return view('admin.employee_details',['employee'=>$employee,'leaves'=>$leaves]);
    }

    public function addLeave(Request $request)
    {	
        $validatedData = $request->validate([
            'employee_id'  => 'required',
            'leave_date'  => 'required',
            'from'  => 'required',
            'to'  => 'required',
        ]);

    	$new = new EmployeeLeaves;
    	$new->employee_id = $request->id;
    	$new->leave_date = $request->date;
    	$new->from = $request->from;
    	$new->to = $request->to;
    	$new->authorized_by_id = Auth::guard('admin')->user()->name;
    	$new->save();

    	return redirect()->back();
    }

    public function delete($id)
    {
    	Employee::where('id',$id)->delete();
    	EmployeeLeaves::where('employee_id',$id)->delete();

    	return redirect()->route('erp');
    }
}
