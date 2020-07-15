@extends('adminlte::page')

@section('content')
<center>Table Number {{$table_number}}<br> {{now()}}
<table class="table-borderless">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Item name</th>
              <th scope="col">Quantity</th>
            </tr>
          </thead>
          <tbody>
            @foreach($kitchen_customize as $k_key)
            @foreach($kitchen as $key)
            @if($k_key->order_id == $key->id)
            @foreach($category_items as $citems)
            @if($key['item_id'] == $citems['item_id'])


            <tr>
              <th scope="row">{{$count++}}</th>
              <td>{{$citems['item_name']}}</td>
              <td>{{$k_key['quantity']}}</td>
            </tr>@endif
            @endforeach
            @endif
            @endforeach
            @endforeach
          </tbody>
        </table>
<button onclick="window.print()">Print</button></center>
@endsection

@section('js')
<script type="text/javascript">
  window.onafterprint = function(){
   console.log("Printing completed...");
}
</script>
@stop

@section('css')

@stop