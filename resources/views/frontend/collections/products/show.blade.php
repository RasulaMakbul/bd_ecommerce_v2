@extends('layouts.user')
@section('title','Product')

@section('content')

<div class="container mt-5">
    <div class="row">


        <div class="col-md-5">
            <div class="exzoom" id="exzoom">
                <div class="exzoom_img_box">
                    <ul class='exzoom_img_ul'>
                        @foreach($product->images as $image)
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
        <div class="col-md-7">
            <div class="name">
                <p>{{$product->shortDefination}}</p>
                <h4>{{$product->name}}</h4>
                <h4 class="colorPrice">Select a Color</h4>
                <div class="container">
                    <div class="row">
                        @if($product->color)
                        @foreach($product->color as $key=>$color)
                        <div class="col border rounded bg-light m-3 p-3">
                            <input type="checkbox" name="color"> <span> </span>
                            <label for="color">{{$color->name}}</label>
                            <button id="colorPricebtn">{{$color->name}}</button>
                        </div>

                        @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
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
        $(document).ready(function() {
            function fetchColor() {
                ajax
            }

            $(document).on('click', '#colorPricebtn', function(e) {
                e.preventDefault();
                alert("{{$color->name}}");
                // $("#colorPrice").text("{{$color->unitPrice}}");
            });
        });
    </script>
    @endpush
</div>
@endsection