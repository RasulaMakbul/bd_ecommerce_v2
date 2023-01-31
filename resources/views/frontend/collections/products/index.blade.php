@extends('layouts.user')
@section('title','Products')

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">{{$category->name}}</h4>
            </div>
            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="#">
                        <div class="category-card-img">
                            <img src="{{asset('storage/category/'.$category->image)}}" class="w-100" alt="Laptop" style="height: 200px;">
                        </div>
                        <div class="category-card-body">
                            <h5>{{$category->name}}</h5>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">{{__('Products For ')}}{{$category->name}}</h4>
            </div>
            <livewire:frontend.product.index :products="$products" :category="$category" />
            @push('scripts')
            <script>
                $(function() {

                    $("#exzoom").exzoom({

                        // thumbnail nav options
                        "navWidth": 70,
                        "navHeight": 70,
                        "navItemNum": 15,
                        // "navItemMargin": 2,
                        "navBorder": 1,

                        // autoplay
                        "autoPlay": false,

                        // autoplay interval in milliseconds
                        "autoPlayTimeout": 2000

                    });

                });
            </script>
            @endpush

        </div>
    </div>
</div>
@endsection