<div>
    <div class="col-md-3">
        @forelse($products as $item)
        <div class="product-card">
            <div class="product-card-img">
                @if($item->stock > 0)
                <label class="stock bg-success">{{__('In Stock')}}</label>
                @else
                <label class="stock bg-danger">{{__('Out of Stock')}}</label>
                @endif
                <div class="caaroselTest">
                    <div class="exzoom" id="exzoom">
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                @foreach($item->images as $image)
                                <li>
                                    <img src="{{ asset('/storage/' . $image) }}" alt="multiple image" class=" border border-blue-600">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn">
                                < </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="product-card-body">
                <p class="product-brand">HP</p>
                <h5 class="product-name">
                    <a href="">
                        {{$item->name}}
                    </a>
                </h5>
                <div>
                    <span class="selling-price">{{$item->unitPrice}}</span>
                    <span class="original-price">{{$item->unitPrice}}</span>
                </div>
                <div class="mt-2">
                    <a href="" class="btn btn1">Add To Cart</a>
                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                    <a href="" class="btn btn1"> View </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <h4>{{__('No product available')}}</h4>
        </div>
        @endforelse
    </div>
</div>