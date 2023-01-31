@extends('layouts.user')
@section('title','All Categories')

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Categories</h4>
            </div>
            @forelse($categories as $item)
            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="{{route('collections.category',$item->slug)}}">
                        <div class="category-card-img">
                            <img src="{{asset('storage/category/'.$item->image)}}" class="w-100" alt="Laptop" style="height: 200px;">
                        </div>
                        <div class="category-card-body">
                            <h5>{{$item->name}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h4>{{__('No categories available')}}</h4>
            </div>
            @endforelse

        </div>
    </div>
</div>
@endsection