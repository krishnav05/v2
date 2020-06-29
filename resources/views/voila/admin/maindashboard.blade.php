@extends('adminlte::page')

@section('content')
<div class="container-fluid admin">
        <div class="row">
            <div class="col-8">
               
                <h1>New Orders</h1>
                <div class="mt-4">
                    <a href="" class="dine-in-order"><img src="{{theme_url('assets/img/ic-dine-in.svg')}}" class="d-inline mr-4" width="24" height="24" alt="Dine-in" title="Dine-in"> Dine In Order</a>
                    <a href="" class="take-away-order"><img src="{{theme_url('assets/img/ic-take-away.svg')}}" class="d-inline mr-4" width="24" height="24" alt="Take Away" title="Take Away"> Take Away Order</a>
                    

                </div>
            
            <div class=" mt-5">
                <h1>Orders</h1>
                <div class="row mt-4">
                    <div class="col card order-box">
                      <div class="card-header take-away">
                        Order No: 250 <span class="float-right"><img src="{{theme_url('assets/img/ic-take-away.svg')}}" width="24" height="24" alt="Take Away" title="Take Away"></span>
                      </div>
                      <div class="card-body h-100">
                        <p>Bhawalpur ke ganne ka ras <br><a href="">+ 2 more</a></p>
                      </div>
                      <div class="card-footer order-ft text-muted">
                        Order Status : <strong>Preparing</strong>
                      </div>
                    </div>

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

                     <div class="col card order-box ">
                      <div class="card-header take-away">
                        Order No: 252 <span class="float-right"><img src="{{theme_url('assets/img/ic-take-away.svg')}}" width="24" height="24" alt="Take Away" title="Take Away"></span>
                      </div>
                      <div class="card-body h-100">
                        <p>Bhawalpur ke ganne ka ras <br><a href="">+ 2 more</a></p>
                      </div>
                      <div class="card-footer order-ft text-muted">
                        Order Status : <strong>Not Accepted</strong>
                      </div>
                    </div>

                </div>
            </div>
           </div>

           <div class="col-4 order-detl-view-pnl p-0">
           <h1 class="take-away mb-0">Order No: 250 <span class="float-right"><img src="{{theme_url('assets/img/ic-take-away.svg')}}" width="24" height="24" alt="Take Away" title="Take Away"></span></h1>
           <!-- <h1 class="dine-in mb-0">Order No: 250  <span class="float-right"><img src="assets/img/ic-dine-in.svg" width="24" height="24" alt="Dine-in" title="Dine-in"></span></h1> -->
           <div class="col order-dtl-list p-0">
               <table class="table table-bordered">
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
                </table>
           </div>
           <div class="col order-status p-0">
               <h2>Order Status</h2>
               <div class="mt-4 order-status-action ">
                   <a href="" class="ticked">Accept Order</a> <a href="" class="current">Preparing</a> <a href="">Out for Delivery</a> <a href="">Delievered</a>
               </div>
           </div>
           <div class="col pnl-actions p-0 mt-5">
               <h2>ACTIONS</h2>
               <input type="button" name="" value="+ Add items to order" class="btn add-itm-pnl">

           </div>
           <input type="button" name="" value="Proceed To Checkout" class="btn pnl-proced-chk-ot">
           </div>
        </div>

       

       
    </div>


@endsection

@section('js')


@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{theme_url('assets/css/admin-style.css')}}">
@stop