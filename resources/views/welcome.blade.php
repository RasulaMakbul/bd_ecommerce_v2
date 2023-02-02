@extends('layouts.user')
@section('title','Welcome')

@section('content')


@include('layouts.inc.frontend.slider')

<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h4>{{__('Most Wanted Products')}}</h4>
                <div class="underline mx-auto"></div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi illum, tempora iusto et molestiae vitae nobis minus dolorem perferendis necessitatibus? Ipsa temporibus blanditiis suscipit minima velit animi maxime consequatur repudiandae!</p>
            </div>
        </div>
    </div>
</div>
<div class="py-5 bg-white">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h4>{{__('Trending Products')}}</h4>
                <div class="underline"></div>
            </div>
            @if($trendingProducts)
            <div class="col-md-12 ">
                <div class="owl-carousel owl-theme trending-product">
                    @foreach($trendingProducts as $item)
                    <div class="items">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-success">{{__('New')}}</label>

                                @foreach($item->images as $image)
                                <img src="{{ asset('/storage/' . $image) }}" alt="multiple image" class=" border border-blue-600">
                                @endforeach


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
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="col-md-12">
                <h4>{{__('No product available')}}</h4>
            </div>
            @endif
            <div class="underline"></div>
        </div>
    </div>
</div>



<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>


@endsection

@section('script')
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>
@endsection