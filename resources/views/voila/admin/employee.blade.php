@extends('adminlte::page')

@section('content')
<h3>Employee List</h3>

<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Shift Timings</th>
      <th scope="col">Designation</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($employees as $employee)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$employee['name']}}</td>
      <td>{{$employee['shift_timings']}}</td>
      <td>{{$employee['designation']}}</td>
      <td><a class="btn btn-outline-primary" href="/admin/employees/{{$employee['id']}}" role="button">+ Details</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

@section('js')

@stop

@section('css')
    
@stop