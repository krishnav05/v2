@extends('adminlte::page')

@section('content')
<div class="container-fluid admin">
        <div class="row">
            <div class="col-8">
               
                <h1>New Orders</h1>
                <div class="mt-4">
                    <a href="dinein_menu" class="dine-in-order"><img src="{{theme_url('assets/img/ic-dine-in.svg')}}" class="d-inline mr-4" width="24" height="24" alt="Dine-in" title="Dine-in"> Dine In Order</a>
                    <a href="delivery_menu" class="take-away-order"><img src="{{theme_url('assets/img/ic-take-away.svg')}}" class="d-inline mr-4" width="24" height="24" alt="Take Away" title="Take Away"> Take Away Order</a>
                    

                </div>
            
            <div class=" mt-5">
                <h1>Orders</h1>
                <div class="row mt-4">
                    @foreach($orders as $order)
                    <div class="col card order-box" onclick="location.href='order/{{$order['id']}}';">
                      <div class="card-header take-away">
                        Order No: {{$order['id']}} <span class="float-right"><img src="{{theme_url('assets/img/ic-take-away.svg')}}" width="24" height="24" alt="Take Away" title="Take Away"></span>
                      </div>
                      <div class="card-body h-100">
                        <p>Bhawalpur ke ganne ka ras <br><a href="">+ 2 more</a></p>
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
                        <p>Bhawalpur ke ganne ka ras <br><a href="">+ 2 more</a></p>
                      </div>
                      <div class="card-footer order-ft text-muted">
                        Order Status : <strong>Out For Delivery</strong>
                      </div>
                    </div>

                </div>
            </div>
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