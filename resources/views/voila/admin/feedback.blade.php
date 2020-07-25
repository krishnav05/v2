@extends('adminlte::page')

@section('content')
<table class="table table-borderless">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Table Order Id</th>
      <th scope="col">Table Number</th>
      <th scope="col">Food Likeness</th>
      <th scope="col">Service</th>
      <th scope="col">Staff Behaviour</th>
      <th scope="col">Service Speed</th>
      <th scope="col">Cleanliness</th>
      <th scope="col">Dining Experience</th>
      <th scope="col">Date & Time</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($feedback as $feed)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$feed->table_order_id}}</td>
      <td>{{$feed->table_number}}</td>
      <td>{{$feed->food}}</td>
      <td>{{$feed->service}}</td>
      <td>{{$feed->staff}}</td>
      <td>{{$feed->speed}}</td>
      <td>{{$feed->clean}}</td>
      <td>{{$feed->dineexp}}</td>
      <td>{{$feed->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

@section('js')


@stop

@section('css')

@stop