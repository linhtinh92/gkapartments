<div class="modal fade" id="my_contact_us" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
            </div>
            <form action="{{route('admin.contacts.update',$contact->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
            <div class="modal-body">
                    <ul class="list-condensed list-unstyled invoice-payment-details">
                        <li>
                            <div class="row">
                                <div class="col-md-3">Fullname</div>
                                <div class="col-md-9">{{$contact->fullname}}</div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-3">Email</div>
                                <div class="col-md-9">{{$contact->email}}</div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-3">Phone</div>
                                <div class="col-md-9">{{$contact->phone}}</div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-3">Address</div>
                                <div class="col-md-9">{{$contact->address}}</div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-3">Message</div>
                                <div class="col-md-9">{{$contact->message}}</div>
                            </div>
                        </li>
                    </ul>
                <input type="hidden" value="1" name="status">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>