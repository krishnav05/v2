@extends('adminlte::page')

@section('content')
<div class="container-fluid admin">
  <div class="row">
    <div class="col-8">
     <div class="row">
      <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          @foreach($category_names as $key)
          @if ($loop->first)
          <a class="nav-link active" id="" data-toggle="pill" href="#{{str_replace(' ','',$key['category_name'])}}" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$key['category_name']}}</a>
          @else
          <a class="nav-link" id="" data-toggle="pill" href="#{{str_replace(' ','',$key['category_name'])}}" role="tab" aria-controls="v-pills-profile" aria-selected="false">{{$key['category_name']}}</a>
          @endif
          @endforeach
        </div>
      </div>
      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
          @foreach($category_names as $cdata)
          <div class="tab-pane fade show @if($loop->first) active @endif" id="{{str_replace(' ','',$cdata['category_name'])}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
            @foreach($category_items as $idata)
  @if($cdata['category_id'] == $idata['category_id'])
  <div class="row pl-5 pt-5 pr-5 pb-2 {{$idata['item_vegetarian']}}">
    
    <a class="col-sm-3 ml-4" href="fooditemdetail/{{$idata['item_id']}}">
     <img src="{{theme_url('dine_in_asset/img/fooditems/'.$idata['image'].'')}}" class="menu-item-img img-fluid" >
     <img src="{{theme_url('dine_in_asset/img/ic-food-more.svg')}}" class="ic-food-more">

   </a>

   
   <div class="col-sm-6">
     <h2 class="change-txt-size"><img src="{{theme_url('dine_in_asset/img/ic-'.$idata['item_vegetarian'].'.svg')}}" class="veg-badge mr-1 d-inline"><a href="fooditemdetail/{{$idata['item_id']}}"> {{$idata['item_name']}}</a></h2>
     <p class="menu-item-short-desc mb-1 change-txt-size"> {{$idata['item_description']}} </p>
     <p class="item-contains change-txt-size"> 
      @foreach($item_details as $itemdetail)
      @if($idata['item_id'] == $itemdetail['item_id'])
      <img src="{{theme_url('dine_in_asset/img/'.$itemdetail['item_detail_image'].'')}}" class="d-inline"> {{$itemdetail['item_attribute']}}
      @endif
      <!-- <img src="assets/img/ic-nuts.svg" class="d-inline"> Contains Nuts |  -->
      <!-- <img src="assets/img/ic-pork.svg" class=" d-inline"> Contains Pork  -->
      @endforeach

    </p>
     @if($idata['item_quantity'] != '')
    <div class="row">
      <div class="col-sm-5">
       
        <button type="button" class="btn btn-outline-primary add-item-btn btn-sm w-auto" id="{{$idata['item_id']}}" data-toggle="modal" data-target="#n{{$idata['item_id']}}"  style="
        display: none;"> <img src="{{theme_url('dine_in_asset/img/ic-plus.svg')}}" class="d-inline"> ADD</button>
        <div class="input-group" style="display: block;">
         
          <button class="btn btn-light btn-sm float-left minus" id="{{$idata['item_id']}}"><img src="{{theme_url('dine_in_asset/img/ic-minus.svg')}}" class="d-inline"></button>
          
          <input type="number" id="qty_input{{$idata['item_id']}}" class="add-plus-min float-left" value="{{$idata['item_quantity']}}" min="0" disabled>
          
          <button class="btn btn-light btn-sm float-left plus" id="{{$idata['item_id']}}"><img src="{{theme_url('dine_in_asset/img/ic-plus.svg')}}" class="d-inline"></button>
          
        </div>
      </div> 
      <div class="col-sm-7">
        @if($idata['item_id'] == 'A3' || $idata['item_id'] == 'A5')
        <span class="d-inline ml-4 item-discount-inline change-txt-size">  <img src="{{theme_url('dine_in_asset/img/ic-discount.svg')}}" class="mr-1"> {{$idata['discount']}}% off on this item </span>
        @endif
      </div>                  
    </div>
    @else
          <div class="row">
      <div class="col-sm-5">
       
        <button type="button" class="btn btn-outline-primary add-item-btn btn-sm w-auto" id="{{$idata['item_id']}}" data-toggle="modal" data-target="#n{{$idata['item_id']}}"> <img src="{{theme_url('dine_in_asset/img/ic-plus.svg')}}" class="d-inline"> ADD</button>
        <div class="input-group">
         
          <button class="btn btn-light btn-sm float-left minus" id="{{$idata['item_id']}}"><img src="{{theme_url('dine_in_asset/img/ic-minus.svg')}}" class="d-inline"></button>
          
          <input type="number" id="qty_input{{$idata['item_id']}}" class="add-plus-min float-left" value="0" min="0" disabled>
          
          <button class="btn btn-light btn-sm float-left plus" id="{{$idata['item_id']}}"><img src="{{theme_url('dine_in_asset/img/ic-plus.svg')}}" class="d-inline"></button>
          
        </div>
      </div> 
      <div class="col-sm-7">
        @if($idata['item_id'] == 'A3' || $idata['item_id'] == 'A5')
        <span class="d-inline ml-4 item-discount-inline change-txt-size">  <img src="{{theme_url('dine_in_asset/img/ic-discount.svg')}}" class="mr-1"> {{$idata['discount']}}% off on this item </span>
        @endif
      </div>                  
    </div>
    @endif
  </div>
  <div class="col-sm-2">
   <span class="item-price change-txt-size"> {{$idata['item_price']}} </span>
 </div>
 
</div>
        @if($idata['recommended_total_items'] !== 0)
        <!-- Recommended box Start -->
        <div class="recommended-box mt-4" style="display: none;">
          <div class="container">
            <h5 class="mb-4">Recommended with {{$idata['item_name']}}</h5>
            <div class="recommend">
              @foreach($recommended_items as $rec_key)
                @if($rec_key['item_id'] == $idata['item_id'])
                  @foreach($category_items as $match_key)
                    @if($match_key['item_id'] == $rec_key['recommended_item_id'])
                   <div class="col">
                    <a class="recommend-item-img d-block" href="fooditemdetail/{{$match_key['item_id']}}">
                      <img src="{{theme_url('dine_in_asset/img/fooditems/'.$match_key['image'].'')}}" class="img-fluid item-pic">
                      <img src="{{theme_url('dine_in_asset/img/ic-'.$match_key['item_vegetarian'].'.svg')}}" class="non-veg-tag">
                      <img src="{{theme_url('asset/img/ic-food-more.svg')}}" class="more">
                    </a>
                    <h6 class="mt-2"><a href="fooditemdetail/{{$match_key['item_id']}}"> {{$match_key['item_name']}} </a></h6>
                    <p class="menu-item-short-desc change-txt-size mb-1"> {{$match_key['item_description']}}  </p>
                    <p class="item-contains change-txt-size"> <img src="{{theme_url('dine_in_asset/img/ic-spicy.svg')}}" class="d-inline"> Spicy | <img src="{{theme_url('dine_in_asset/img/ic-nuts.svg')}}" class="d-inline"> Contains Nuts | <img src="{{theme_url('dine_in_asset/img/ic-pork.svg')}}" class=" d-inline"> Contains Pork </p>
                    <div>
                      @if($match_key['item_quantity'] != '')

        <button type="button" class="btn btn-outline-primary add-item-btn btn-sm w-auto" id="rec_{{$match_key['item_id']}}" data-toggle="modal" data-target="#n{{$match_key['item_id']}}"  style="
        display: none;"> <img src="{{theme_url('dine_in_asset/img/ic-plus.svg')}}" class="d-inline"> ADD</button>
        <div class="input-group" style="display: block;">
         
          <button class="btn btn-light btn-sm float-left minus" id="rec_{{$match_key['item_id']}}"><img src="{{theme_url('dine_in_asset/img/ic-minus.svg')}}" class="d-inline"></button>
          
          <input type="number" id="rec_qty_input{{$match_key['item_id']}}" class="add-plus-min float-left" value="{{$match_key['item_quantity']}}" min="0" disabled>
          
          <button class="btn btn-light btn-sm float-left plus" id="rec_{{$match_key['item_id']}}"><img src="{{theme_url('dine_in_asset/img/ic-plus.svg')}}" class="d-inline"></button>
          
    @else
       
        <button type="button" class="btn btn-outline-primary add-item-btn btn-sm w-auto" id="rec_{{$match_key['item_id']}}" data-toggle="modal" data-target="#n{{$match_key['item_id']}}"> <img src="{{theme_url('dine_in_asset/img/ic-plus.svg')}}" class="d-inline"> ADD</button>
        <div class="input-group">
         
          <button class="btn btn-light btn-sm float-left minus" id="rec_{{$match_key['item_id']}}"><img src="{{theme_url('dine_in_asset/img/ic-minus.svg')}}" class="d-inline"></button>
          
          <input type="number" id="rec_qty_input{{$match_key['item_id']}}" class="add-plus-min float-left" value="0" min="0" disabled>
          
          <button class="btn btn-light btn-sm float-left plus" id="rec_{{$match_key['item_id']}}"><img src="{{theme_url('dine_in_asset/img/ic-plus.svg')}}" class="d-inline"></button>                  
    
    @endif
                    </div>
                    <span class="item-price change-txt-size float-right"> {{$match_key['item_price']}} </span>          
                  </div>
                </div>
                @endif
              @endforeach
            @endif
          @endforeach
        </div>  
        </div>
        </div>
        <!-- Recommended box end -->
        @endif
@endif
@endforeach
</div>
@endforeach
</div>
</div>
</div>
</div>

<div class="col-4 order-detl-view-pnl p-0">

</div>
</div>
<div class="col-4 order-detl-view-pnl p-0">
           <h1 class="dine-in mb-0">Table No: {{$table_number}} <span class="float-right"><img src="{{theme_url('assets/img/ic-dine-in.svg')}}" width="24" height="24" alt="Take Away" title="Take Away"></span></h1>
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

           <input type="button" name="" value="CONFIRM ITEMS" class="btn confirm-items">
           </div>       
</div>
</div>
@endsection

@section('js')

@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{theme_url('admin/css/menu-style.css')}}">
<link rel="stylesheet" type="text/css" href="{{theme_url('assets/css/admin-style.css')}}">
@stop