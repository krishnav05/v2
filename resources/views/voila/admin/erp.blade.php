@extends('adminlte::page')

@section('content')
<a class="btn btn-outline-primary" href="/admin/employees" role="button">View Employees</a>

<h3>Add Employee (please fill out every field, otherwise the employee will not be added)</h3>
<form method="POST" action="add_employee">
	@csrf
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Name</td>
      <td><input type="text" class="form-control" name="name"></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><input type="number" class="form-control" name="age"></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="text" class="form-control" name="gender"></td>
    </tr>
    <tr>
      <td>Email (if available)</td>
      <td><input type="email" class="form-control" name="email"></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><input type="number" class="form-control" name="phone"></td>
    </tr>
    <tr>
      <td>Shift Timings</td>
      <td><input type="text" class="form-control" name="shift_timings"></td>
    </tr>
    <tr>
      <td>Designation</td>
      <td><input type="text" class="form-control" name="designation"></td>
    </tr>
    <tr>
      <td>Employer Notes</td>
      <td><input type="text" class="form-control" name="employer_notes"></td>
    </tr>
    <tr>
      <td>Emergency Contact Name</td>
      <td><input type="text" class="form-control" name="emergency_name"></td>
    </tr>
    <tr>
      <td>Emergency Contact Number</td>
      <td><input type="number" class="form-control" name="emergency_phone"></td>
    </tr>
    <tr>
      <td><button type="submit" class="btn btn-outline-dark">Add</button></td>
    </tr>
  </tbody>
</table>
</form>
@endsection

@section('js')

@stop

@section('css')
    
@stop