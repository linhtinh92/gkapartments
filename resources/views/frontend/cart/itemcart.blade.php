@foreach(Cart::content() as $row)
    <div class="cat {{$row->rowId}}" id="item_cart">
        <a href="{{route("web.productDetail",$row->options->has('slug') ? $row->options->slug : '')}}" title="{{$row->name}}">
            <img src="{{url($row->options->has('avatar') ? $row->options->avatar : '')}}" alt="{{$row->name}}">
        </a>
        <div class="cat_two">
            <p>
                <a href="{{route("web.productDetail",$row->options->has('slug') ? $row->options->slug : '')}}" title="{{$row->name}}">
                    {{$row->name}}
                </a>
            </p>
            <p><span id="qty_cart">{{$row->qty}}</span> x {{number_format($row->price)}} {{$frontEndConfig['sub_money']}}</p>
        </div>
        <div class="cat_icon">
            <a href="javascript:void(0)"
               id="remove_item_cart"
               data-cart-id="{{$row->rowId}}"
               data-token="{{csrf_token()}}"
               data-url="{{route("web.removeItemCart")}}">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
@endforeach