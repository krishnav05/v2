@extends('adminlte::page')

@section('content')
<div class="container-fluid admin">
  <div class="row">
    <div class="col-8">
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

             
             <div class="col">
               <h2 class="change-txt-size"> <a> {{$idata['item_name']}}</a></h2>
               <p class="item-contains change-txt-size">


               </p>
               @if($idata['item_quantity'] != '')
               <div class="row">
                <div class="col">
                  <div class="input-group" style="display: block;">

                    <button class="btn btn-light btn-sm float-left minus" id="{{$idata['item_id']}}"><img src="{{theme_url('assets/img/ic-minus.svg')}}" class="d-inline"></button>

                    <input type="number" id="qty_input{{$idata['item_id']}}" class="add-plus-min float-left" value="{{$idata['item_quantity']}}" min="0" disabled>

                    <button class="btn btn-light btn-sm float-left plus" id="{{$idata['item_id']}}"><img src="{{theme_url('assets/img/ic-plus.svg')}}" class="d-inline"></button>

                  </div>
                </div>          
              </div>
              @else
              <div class="row">
                <div class="col">
                  <div class="input-group">

                    <button class="btn btn-light btn-sm float-left minus" id="{{$idata['item_id']}}"><img src="{{theme_url('assets/img/ic-minus.svg')}}" class="d-inline"></button>

                    <input type="number" id="qty_input{{$idata['item_id']}}" class="add-plus-min float-left" value="0" min="0" disabled>

                    <button class="btn btn-light btn-sm float-left plus" id="{{$idata['item_id']}}"><img src="{{theme_url('assets/img/ic-plus.svg')}}" class="d-inline"></button>

                  </div>
                </div>        
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

<div class="col-4 order-detl-view-pnl p-0">

</div>
</div>       
</div>
@endsection

@section('js')

@stop

@section('css')

@stop