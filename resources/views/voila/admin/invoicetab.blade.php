@extends('adminlte::page')

@section('content')
<center>Dine In Invoices</center>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order ID</th>
      <th scope="col">Table Number</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$order['id']}}</td>
      <td>{{$order['table']}}</td>
      <td>{{$order['bill']}}</td>
      <td><a id="invoice" onclick="window.open('http://v2.in/admin/invoice/{{$order['id']}}');">Print Invoice</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<br>
<center>Online Order Invoices</center>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order Id</th>
      <th scope="col">Razorpay Payment Id</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($online_orders as $online)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$online['id']}}</td>
      <td>{{$online['razorpay_payment_id']}}</td>
      <td>{{$online['amount']*0.01}}</td>
      <td><a id="invoice" onclick="window.open('http://v2.in/admin/online_invoice/{{$online['id']}}');">Print Invoice</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

@section('js')
@stop

@section('css')

@stop