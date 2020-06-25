@extends('adminlte::page')

@section('content')
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Details</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($employee as $employe)
    <tr>
      <td>Name</td>
      <td>{{$employe['name']}}</td>
    </tr>
    <tr>
      <td>Age</td>
      <td>{{$employe['age']}}</td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>{{$employe['gender']}}</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>{{$employe['email']}}</td>
    </tr>
    <tr>
      <td>Phone</td>
      <td>{{$employe['phone']}}</td>
    </tr>
    <tr>
      <td>Shift Timings</td>
      <td>{{$employe['shift_timings']}}</td>
    </tr>
    <tr>
      <td>Designation</td>
      <td>{{$employe['designation']}}</td>
    </tr>
    <tr>
      <td>Employer Notes</td>
      <td>{{$employe['employer_notes']}}</td>
    </tr>
    <tr>
      <td>Emergency Contact Name</td>
      <td>{{$employe['emergency_name']}}</td>
    </tr>
    <tr>
      <td>Emergency Contact Number</td>
      <td>{{$employe['emergency_phone']}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<br>
<h3>Leave Details</h3>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Leave Date</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Authorized By</th>
    </tr>
  </thead>
  <tbody>
    @foreach($leaves as $leave)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$leave['leave_date']}}</td>
      <td>{{$leave['from']}}</td>
      <td>{{$leave['to']}}</td>
      <td>{{$leave['authorized_by_id']}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<br>

<h3>Add A Leave (please fill out every field, otherwise the employee leave will not be added)</h3>
<form method="POST" action="add_leave">
  @csrf
  @foreach($employee as $employe)
  <input type="hidden" name="id" value="{{$employe['id']}}">
  @endforeach
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" class="form-control" name="date"></td>
      <td><input type="text" class="form-control" name="from"></td>
      <td><input type="text" class="form-control" name="to"></td>
      <td><button type="submit" class="btn btn-outline-dark">Add</button></td>
    </tr>
  </tbody>
</table>
</form>

<h3>Danger Section</h3>
@foreach($employee as $employe)
<a class="btn btn-outline-danger" href="/admin/delete/{{$employe['id']}}" role="button">Delete Employee</a>
@endforeach
@endsection

@section('js')

@stop

@section('css')
    
@stop