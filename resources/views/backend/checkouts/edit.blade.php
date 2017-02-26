<div class="modal fade" id="my_checkout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Checkout Code {{$checkout->code}}</h4>
            </div>
            <form action="{{route("admin.checkouts.update",$checkout->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    <ul class="list-condensed list-unstyled invoice-payment-details">
                        @if($checkout->fullname != "")
                            <li>
                                <div class="row">
                                    <div class="col-md-3">Fullname</div>
                                    <div class="col-md-9">{{$checkout->fullname}}</div>
                                </div>
                            </li>
                        @endif
                        @if($checkout->company_name != "")
                            <li>
                                <div class="row">
                                    <div class="col-md-3">Company Name</div>
                                    <div class="col-md-9">{{$checkout->company_name}}</div>
                                </div>
                            </li>
                        @endif
                        @if($checkout->email != "")
                            <li>
                                <div class="row">
                                    <div class="col-md-3">Email</div>
                                    <div class="col-md-9">{{$checkout->email}}</div>
                                </div>
                            </li>
                        @endif
                        @if($checkout->phone != "")
                            <li>
                                <div class="row">
                                    <div class="col-md-3">Phone</div>
                                    <div class="col-md-9">{{$checkout->phone}}</div>
                                </div>
                            </li>
                        @endif
                        @if($checkout->address != "")
                            <li>
                                <div class="row">
                                    <div class="col-md-3">Address</div>
                                    <div class="col-md-9">{{$checkout->address}},{{$checkout->getDistrict->title}}
                                        ,{{$checkout->getProvince->title}}</div>
                                </div>
                            </li>
                        @endif
                        @if($checkout->note != "")
                            <li>
                                <div class="row">
                                    <div class="col-md-3">Note</div>
                                    <div class="col-md-9">{{$checkout->note}}</div>
                                </div>
                            </li>
                        @endif
                    </ul>
                    @if(count($checkout->getShopCart) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">Shop Cart</div>
                            <div class="panel-body">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th width="10px">#</th>
                                        <th>Product Name</th>
                                        <th>Product Avatar</th>
                                        <th>Product Price</th>
                                        <th>Product Qty</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($checkout->getShopCart as $key=>$cart)
                                        <tr>
                                            <th scope="row">
                                                {{$key+1}}
                                            </th>
                                            <td>{{$cart->product_name}}</td>
                                            <td>
                                                <img src="{{url($cart->product_avatar)}}" width="100px">
                                            </td>
                                            <td>{{number_format($cart->product_price)}}</td>
                                            <td>{{$cart->product_qty}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="0" {{$checkout->status ==0 ? "selected" :""}}>Unconfimred</option>
                                    <option value="1" {{$checkout->status ==1 ? "selected" :""}}>Confirmed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td class="text-center">
                                        <strong>Subtotal:</strong>
                                    </td>
                                    <td class="text-center only_subtotal_cart">{{$checkout->subtotal}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <strong>Total:</strong>
                                    </td>
                                    <td class="text-center only_total_cart">{{$checkout->total}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>