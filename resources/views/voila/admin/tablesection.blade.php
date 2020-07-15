<h1 class="dine-in mb-0">Table No: {{$table_number}} <span class="float-right"><img src="{{theme_url('assets/img/ic-dine-in.svg')}}" width="24" height="24" alt="Take Away" title="Take Away"></span></h1>
           <!-- <h1 class="dine-in mb-0">Order No: 250  <span class="float-right"><img src="assets/img/ic-dine-in.svg" width="24" height="24" alt="Dine-in" title="Dine-in"></span></h1> -->
           <input id="tbno" type="hidden" name="tbno" value="{{$table_number}}">
           <div class="col order-dtl-list p-0">
               <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">S. No.</th>
                      <th scope="col">Item Name</th>
                      <th scope="col">Quantity</th>
                     
                    </tr>
                  </thead>
                  <tbody>@foreach($kitchen_customize as $k_key)
              @foreach($kitchen as $key)
              @if($k_key->order_id == $key->id)
              @foreach($category_items as $citems)
              @if($citems->item_id == $key->item_id)
                    <tr>
                      <th scope="row">{{$count++}}</th>
                      <td>{{$citems->item_name}}, @foreach($addons as $item_addon)
                @if($item_addon->order_id == $k_key->id)
                  @if($item_addon->addon_name !== 'note')
                    {{$item_addon->addon_name}},
                  @endif
                @endif
              @endforeach
              @foreach($addons as $item_addon)
                @if($item_addon->order_id == $k_key->id)
                  @if($item_addon->addon_name == 'note')
                    @if($item_addon->addon_value !== null)
                      Notes: {{$item_addon->addon_value}}
                    @endif
                  @endif
                @endif
              @endforeach</td>
                      <td>{{$k_key->quantity}}</td>
                     
                    </tr>
                    @endif
              @endforeach
              @endif
              @endforeach
              @endforeach
                  </tbody>
                </table>
           </div>

           <input type="button" name="" value="CONFIRM" class="btn confirm-items" onclick="location.href = '/admin/confirmitems/{{$table_number}}';">