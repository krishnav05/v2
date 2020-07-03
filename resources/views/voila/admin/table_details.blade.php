@extends('adminlte::page')

@section('content')
<div class="container-fluid admin">
        <div class="row">
            <div class="col-8">
               
                <h1>New Orders</h1>
                <div class="mt-4">
                    <a href="#" class="dine-in-order"><img src="{{theme_url('assets/img/ic-dine-in.svg')}}" class="d-inline mr-4" width="24" height="24" alt="Dine-in" title="Dine-in"> Dine In Order</a>
                    <a href="#" class="take-away-order"><img src="{{theme_url('assets/img/ic-take-away.svg')}}" class="d-inline mr-4" width="24" height="24" alt="Take Away" title="Take Away"> Take Away Order</a>
                    

                </div>
            
            <div class=" mt-5">
                <h1>Orders</h1>
                <div class="row mt-4">
                    @foreach($orders as $order)
                    <div class="col card order-box" onclick="location.href ='/admin/order/{{$order['id']}}';">
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

                    @foreach($tables as $table)
                    <div class="col card order-box" onclick="location.href = '/admin/table/{{$table['table_number']}}';">
                      <div class="card-header dine-in">
                        Table No: {{$table['table_number']}} <span class="float-right"><img src="{{theme_url('assets/img/ic-dine-in.svg')}}" width="24" height="24" alt="Dine-in" title="Dine-in"></span>                      </div>
                      <div class="card-body h-100">
                        <p>Bhawalpur ke ganne ka ras <br><a href="">+ more</a></p>
                      </div>
                      <div class="card-footer order-ft text-muted">
                        Order Status : <strong>Out For Delivery</strong>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
           </div>

           <div class="col-4 order-detl-view-pnl p-0">
           <h1 class="dine-in mb-0">Table No: {{$table_number}} <span class="float-right"><img src="{{theme_url('assets/img/ic-dine-in.svg')}}" width="24" height="24" alt="Take Away" title="Take Away"></span></h1>
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
@foreach($kitchen_customize as $k_key)
            @foreach($kitchen as $key)
            @if($k_key->order_id == $key->id)
            @foreach($category_items as $citems)
            @if($key['item_id'] == $citems['item_id'])
                          
                          
    <tr>
      <th scope="row">{{$count++}}</th>
      <td>{{$citems['item_name']}}</td>
      <td>{{$k_key['quantity']}}</td>
      <td>₹ {{$citems['item_price'] * $k_key['quantity']}}</td>
    </tr>@endif
            @endforeach
            @endif
            @endforeach
            @endforeach
                          <tr>
      <th scope="row"></th>
      <td>Total Price</td>
      <td></td>
      <td>₹ {{$total_bill}}</td>
    </tr>
  </tbody>
</table>
           </div>
           
           <div class="col pnl-actions p-0 mt-5">
               <h2>ACTIONS</h2>
               <input type="button" name="" value="+ Add items to order" class="btn add-itm-pnl" onclick="location.href = '/admin/menu/{{$table_number}}';">

           </div>
           <input type="button" name="" value="Proceed To Checkout" class="btn pnl-proced-chk-ot">
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