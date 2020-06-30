@extends('adminlte::page')

@section('content')
<div class="container-fluid admin">
        <div class="row">
            <div class="col-8">
               
                <h1>New Orders</h1>
                <div class="mt-4">
                    <a href="../dinein_menu" class="dine-in-order"><img src="{{theme_url('assets/img/ic-dine-in.svg')}}" class="d-inline mr-4" width="24" height="24" alt="Dine-in" title="Dine-in"> Dine In Order</a>
                    <a href="../delivery_menu" class="take-away-order"><img src="{{theme_url('assets/img/ic-take-away.svg')}}" class="d-inline mr-4" width="24" height="24" alt="Take Away" title="Take Away"> Take Away Order</a>
                    

                </div>
            
            <div class=" mt-5">
                <h1>Orders</h1>
                <div class="row mt-4">
                    @foreach($orders as $order)
                    <div class="col card order-box">
                      <div class="card-header take-away">
                        Order No: {{$order['id']}} <span class="float-right"><img src="{{theme_url('assets/img/ic-take-away.svg')}}" width="24" height="24" alt="Take Away" title="Take Away"></span>
                      </div>
                      <div class="card-body h-100">
                        <p>Bhawalpur ke ganne ka ras <br><a href="">+ more</a></p>
                      </div>
                      <div class="card-footer order-ft text-muted">
                        Order Status : <strong>{{$order['order_status']}}</strong>
                      </div>
                    </div>
                    @endforeach

                    <div class="col card order-box">
                      <div class="card-header dine-in">
                        Order No: 251 <span class="float-right"><img src="{{theme_url('assets/img/ic-dine-in.svg')}}" width="24" height="24" alt="Dine-in" title="Dine-in"></span>                      </div>
                      <div class="card-body h-100">
                        <p>Bhawalpur ke ganne ka ras <br><a href="">+ more</a></p>
                      </div>
                      <div class="card-footer order-ft text-muted">
                        Order Status : <strong>Out For Delivery</strong>
                      </div>
                    </div>
                    
                </div>
            </div>
           </div>

           <div class="col-4 order-detl-view-pnl p-0">
           <h1 class="take-away mb-0">Order No: {{$orderid}} <span class="float-right"><img src="{{theme_url('assets/img/ic-take-away.svg')}}" width="24" height="24" alt="Take Away" title="Take Away"></span></h1>
           <!-- <h1 class="dine-in mb-0">Order No: 250  <span class="float-right"><img src="assets/img/ic-dine-in.svg" width="24" height="24" alt="Dine-in" title="Dine-in"></span></h1> -->
           <div class="col order-dtl-list p-0">
               <!-- <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">S. No.</th>
                      <th scope="col">Item Name</th>
                      <th scope="col">Price</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Bhawalpur ke ganne ka ras</td>
                      <td>250.00</td>
                     
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Subzi</td>
                      <td>250.00</td>
                      
                    </tr>
                    <tr>
                                        
                      <td colspan="2" style="background: #F3FAFF;">Total Amount</td>
                      <td style="background: #F3FAFF;">500</td>
                    </tr>
                  </tbody>
                </table> -->
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
                          @if($orderid == $kitchenitems['order_id'])
                          @foreach($itemnames as $inames)
                          @if($inames['item_id'] == $kitchenitems['item_id'])
                          <!-- <p>{{$inames['item_name']}} - {{$kitchenitems['item_quantity']}} </p> -->
                          <!-- <p>Note for chef will display here...</p> -->
                          
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
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
           <div class="col order-status p-0">
               <h2>Order Status</h2>
               <div class="mt-4 order-status-action ">
                   @if($order['order_status'] == 'Pending')
                      <a href="/admin/update/{{$order['id']}}/accept">Accept Order</a> 
                      <a href="/admin/update/{{$order['id']}}/preparing">Preparing</a>
                       <a href="/admin/update/{{$order['id']}}/out-deliv">Out For Delivery</a> 
                       <a href="/admin/update/{{$order['id']}}/delivered">Delivered</a>
                       @elseif($order['order_status'] == 'Accepted')
                       <a href="/admin/update/{{$order['id']}}/accept" class="ticked">Accept Order</a> 
                      <a href="/admin/update/{{$order['id']}}/preparing" class="current">Preparing</a>
                       <a href="/admin/update/{{$order['id']}}/out-deliv">Out For Delivery</a> 
                       <a href="/admin/update/{{$order['id']}}/delivered">Delivered</a>
                       @elseif($order['order_status'] == 'Preparing')
                       <a href="/admin/update/{{$order['id']}}/accept" class="ticked">Accept Order</a> 
                      <a href="/admin/update/{{$order['id']}}/preparing" class="ticked">Preparing</a>
                       <a href="/admin/update/{{$order['id']}}/out-deliv" class="current">Out For Delivery</a> 
                       <a href="/admin/update/{{$order['id']}}/delivered">Delivered</a>
                       @elseif($order['order_status'] == 'Out For Delivery')
                       <a href="/admin/update/{{$order['id']}}/accept" class="ticked">Accept Order</a> 
                      <a href="/admin/update/{{$order['id']}}/preparing" class="ticked">Preparing</a>
                       <a href="/admin/update/{{$order['id']}}/out-deliv" class="ticked">Out For Delivery</a> 
                       <a href="/admin/update/{{$order['id']}}/delivered" class="current">Delivered</a>
                       @elseif($order['order_status'] == 'Delivered')
                        <a href="/admin/update/{{$order['id']}}/accept" class="ticked">Accept Order</a> 
                      <a href="/admin/update/{{$order['id']}}/preparing" class="ticked">Preparing</a>
                       <a href="/admin/update/{{$order['id']}}/out-deliv" class="ticked">Out For Delivery</a> 
                       <a href="/admin/update/{{$order['id']}}/delivered" class="ticked">Delivered</a>
                       @endif
               </div>
           </div>
           <!-- <div class="col pnl-actions p-0 mt-5">
               <h2>ACTIONS</h2>
               <input type="button" name="" value="+ Add items to order" class="btn add-itm-pnl">

           </div>
           <input type="button" name="" value="Proceed To Checkout" class="btn pnl-proced-chk-ot"> -->
           </div>
        </div>

       

       
    </div>


@endsection

@section('js')
<script type="text/javascript">
  $('.order-box').on('click',function(){
  });
</script>

@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{theme_url('assets/css/admin-style.css')}}">
@stop