@extends('layouts.user')
@section('title','New Product')

@section('content')

<div class="container ">
    <div class="row">
        @if($products)
        @foreach($products as $item)
        <div class="col-lg-4 my-5">
            <div class="product-card">
                <div class="product-card-img">
                    <label class="stock bg-success">{{__('New')}}</label>
                    @foreach($item->images as $image)
                    <img src="{{ asset('/storage/' . $image) }}" alt="multiple image" class=" border border-blue-600">
                    @endforeach
                </div>
                <div class="product-card-body">
                    <h3 class="product-name">{{ Str::limit($item->name, 40) }}</h3>
                    <p>{{ Str::limit($item->description, 50) }}</p>
                </div>
                <div class="mt-2">
                    <a href="" class="btn btn1"><i class="fa-solid fa-eye"></i>{{__(' View')}} </a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-md-12">
            <h4>{{__('No product available')}}</h4>
        </div>
        @endif
    </div>
</div>
@endsection