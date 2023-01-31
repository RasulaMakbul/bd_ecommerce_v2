@extends('layouts.admin')
@section('title','Color')

@section('content')
<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">{{('Products')}}</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
            <a href="{{route('product.show',$color->product->id)}}" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <i class="fa-solid fa-list"></i> {{__(' Product')}}
            </a>
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#colorCreateModal">
                <i class="fa-solid fa-plus"></i> {{__('Update Color')}}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="colorCreateModal" tabindex="-1" aria-labelledby="colorCreateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="colorCreateModalLabel">{{__('Update Color')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('color.update',$color->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">{{__('Color Name')}}</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$color->name)}}">
                                    @error('name') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="code" class="form-label">{{__('Color code')}}</label>
                                    <input type="text" class="form-control" id="code" name="code" value="{{old('code',$color->code)}}">
                                    @error('code') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <select name="product_id" class="block w-full mt-1 rounded-md">

                                        <option value="{{$color->product->id}}">{{$color->product->name}}</option>
                                    </select>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="costing" class="form-label">{{__('Costing')}}</label>
                                    <input type="number" class="form-control" id="costing" name="costing" value="{{old('costing',$color->costing)}}">
                                    @error('costing') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="unitPrice" class="form-label">{{__('Unit Price')}}</label>
                                    <input type="number" class="form-control" id="unitPrice" name="unitPrice" value="{{old('unitPrice',$color->unitPrice)}}">
                                    @error('unitPrice') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="stock" class="form-label">{{__('Stock')}}</label>
                                    <input type="number" class="form-control" id="stock" name="stock" value="{{old('stock',$color->stock)}}">
                                    @error('stock') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="images" class="form-label">{{__('Image') }}</label>
                                    <input type="file" name="images[]" class="form-control" id="image" multiple>
                                </div>

                                <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="container">
    <div class="row">
        <div class="col">


            <div class="caaroselTest">
                <div class="exzoom" id="exzoom">
                    <div class="exzoom_img_box">
                        <ul class='exzoom_img_ul'>
                            @foreach($color->images as $image)
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
        <div class="col">
            <h2>{{$color->name}}</h2>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Code')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$color->code}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Product')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>
                            {{$color->product?->name}}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Costing')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$color->costing}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Unit Price')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$color->unitPrice}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Stock')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$color->stock}}</p>
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
    </script>
    @endpush
</div>
<hr>




@endsection