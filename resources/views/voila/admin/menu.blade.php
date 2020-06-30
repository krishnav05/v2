@extends('adminlte::page')

@section('content')
<div id="MyDiv">
<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      @foreach($category as $key)
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
      @foreach($category as $cdata)
      <div class="tab-pane fade show @if($loop->first) active @endif" id="{{str_replace(' ','',$cdata['category_name'])}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
      @foreach($category_items as $idata)
 @if($cdata['category_id'] == $idata['category_id'])
 <div class="row pt-5 pb-2 {{$idata['item_vegetarian']}}">

   <a class="col ml-4 no-pic" href="">
     <img src="{{theme_url('assets/img/fooditems/'.$idata['image'].'')}}" class="menu-item-img img-fluid" >
     <img src="{{theme_url('assets/img/ic-food-more.svg')}}" class="ic-food-more">

   </a>
   <div class="col">
     <h2 class="change-txt-size"><img src="{{theme_url('assets/img/ic-'.$idata['item_vegetarian'].'.svg')}}" class="veg-badge mr-1 d-inline"> <a> {{$idata['item_name']}}</a><span class="item-price change-txt-size float-right"> ₹ {{$idata['item_price']}} </span></h2>
     <p class="menu-item-short-desc change-txt-size mb-1"> {{$idata['item_description']}} </p>
     <p class="item-contains change-txt-size">


     </p>
     @if($idata['item_quantity'] != '')
     <div class="row">
      <div class="col">
        <button type="button" id="{{$idata['item_id']}}" class="btn btn-outline-primary add-item-btn btn-sm w-auto" style="display: none;"> <img src="{{asset('assets/img/ic-plus.svg')}}" class="d-inline"> ADD</button>
        <div class="input-group" style="display: block;">

          <button class="btn btn-light btn-sm float-left minus" id="{{$idata['item_id']}}"><img src="{{theme_url('assets/img/ic-minus.svg')}}" class="d-inline"></button>

          <input type="number" id="qty_input{{$idata['item_id']}}" class="add-plus-min float-left" value="{{$idata['item_quantity']}}" min="0" disabled>

          <button class="btn btn-light btn-sm float-left plus" id="{{$idata['item_id']}}"><img src="{{theme_url('assets/img/ic-plus.svg')}}" class="d-inline"></button>

        </div>
      </div>
      <div class="col">
        <span class="d-inline item-discount-inline change-txt-size">  <img src="{{theme_url('assets/img/ic-discount.svg')}}" class="mr-1"> {{$idata['discount']}}% off </span>
      </div>            
    </div>
    @else
    <div class="row">
      <div class="col">
        <button type="button" id="{{$idata['item_id']}}" class="btn btn-outline-primary add-item-btn btn-sm w-auto"> <img src="{{theme_url('assets/img/ic-plus.svg')}}" class="d-inline"> ADD</button>
        <div class="input-group">

          <button class="btn btn-light btn-sm float-left minus" id="{{$idata['item_id']}}"><img src="{{theme_url('assets/img/ic-minus.svg')}}" class="d-inline"></button>

          <input type="number" id="qty_input{{$idata['item_id']}}" class="add-plus-min float-left" value="0" min="0" disabled>

          <button class="btn btn-light btn-sm float-left plus" id="{{$idata['item_id']}}"><img src="{{theme_url('assets/img/ic-plus.svg')}}" class="d-inline"></button>

        </div>
      </div>
      <!-- <div class="col">
        <span class="d-inline item-discount-inline change-txt-size">  <img src="{{asset('assets/img/ic-discount.svg')}}" class="mr-1"> {{$idata['discount']}}% off </span>
      </div>  -->           
    </div>
    @endif


  </div>  
</div>
@endif
@endforeach


    </div>
    @endforeach
    </div>
  </div>
</div>
</div>
@endsection

@section('js')

@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{theme_url('assets/css/menu-style.css')}}">
@stop