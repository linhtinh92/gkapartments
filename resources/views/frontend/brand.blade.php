<div class="icon-slider-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item_all indicator-style3">
                    @foreach($brands as $brand)
                        <a href="{{$brand->link}}" title="{{$brand->title}}">
                            <img src="{{url($brand->images)}}" alt="{{$brand->title}}"/>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>