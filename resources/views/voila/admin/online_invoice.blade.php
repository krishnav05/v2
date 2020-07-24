@extends('adminlte::page')

@section('content')
@foreach($orders as $order)
@if($order['id'] == $orderid)
              @foreach($user as $userid)
              @if($userid['id'] == $order['user_id'])
              @foreach($useraddress as $uaddress)
              @if($uaddress['id'] == $order['address_id'])
<div class="" id="demo1">
                        <div class="col">
                          <h5> Order Details </h5>
                          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
@foreach($item as $kitchenitems)
                          @if($order['id'] == $kitchenitems['order_id'])
                          @foreach($itemnames as $inames)
                          @if($inames['item_id'] == $kitchenitems['item_id'])
                        
                          
    <tr>
      <th scope="row">1</th>
      <td>{{$inames['item_name']}}</td>
      <td>{{$kitchenitems['item_quantity']}}</td>
      <td>₹ {{$kitchenitems['item_quantity']*$inames['item_price']}}</td>
    </tr>
    @endif
                          @endforeach
                          @endif
                          @endforeach
                          <tr>
      <th scope="row"></th>
      <td>Total Price</td>
      <td></td>
      <td>₹ {{$order['amount']/100}}</td>
    </tr>
  </tbody>
</table>
                          
                        </div>
                        <div class="col pl-5 pr-5">
                          <h5> Delivery Details </h5>
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>Delivery Date</td>
                                <td><strong>{{$order['date']}}</strong></td>
                              </tr>
                              <tr>
                                <td>Delivery Time</td>
                                <td>@foreach($timeslot as $time) @if($time['id'] == $order['time_slot'])<strong> {{$time['details']}}</strong> @endif @endforeach</td>
                              </tr>
                              <tr>
                                <td>Name</td>
                                <td><strong>{{$userid['name']}}</strong> </td>
                              </tr>
                              <tr>
                                <td>Address</td>
                                <td><strong>{{$uaddress['name']}} , 
        {{$uaddress['flat_number']}} ,
        {{$uaddress['society']}} ,
        {{$uaddress['pincode']}} ,
        {{$uaddress['landmark']}}</strong></td>
                              </tr>
                              <tr>
                                <td>Mobile </td>
                                <td> <strong>{{$userid['phone']}}</strong></td>
                              </tr>
                            </tbody>
                          </table>

                        </div>
                    </div> 
                    @endif
                @endforeach
                @endif
                @endforeach
                @endif
                @endforeach   
@endsection

@section('js')
@stop

@section('css')

@stop