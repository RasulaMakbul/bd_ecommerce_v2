@extends('layouts.admin')
@section('title','Product')

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
            <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-outline-secondary ">
                <i class="fa-duotone fa-plus"></i> {{__('Edit Product')}}
            </a>
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#productCreateModal">
                <i class="fa-solid fa-plus"></i> {{__('Create Color')}}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="productCreateModal" tabindex="-1" aria-labelledby="productCreateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productCreateModalLabel">{{__('Create Product')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('color.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">{{__('Color Name')}}</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                    @error('name') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="code" class="form-label">{{__('Color code')}}</label>
                                    <input type="text" class="form-control" id="code" name="code" value="{{old('code')}}">
                                    @error('code') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <select name="product_id" class="block w-full mt-1 rounded-md">

                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    </select>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="costing" class="form-label">{{__('Costing')}}</label>
                                    <input type="text" class="form-control" id="costing" name="costing" value="{{old('costing')}}">
                                    @error('costing') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="unitPrice" class="form-label">{{__('Unit Price')}}</label>
                                    <input type="text" class="form-control" id="unitPrice" name="unitPrice" value="{{old('unitPrice')}}">
                                    @error('unitPrice') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="stock" class="form-label">{{__('Stock')}}</label>
                                    <input type="text" class="form-control" id="stock" name="stock" value="{{old('stock')}}">
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



        </div>
        <div class="col">
            <h2>{{$product->name}}</h2>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Code')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$product->code}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <h5><span class="bg-warning">{{__('Category')}}</span>{{__('/')}}<span class="bg-info">{{__('Subcategory')}}</span></h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>
                            @if(!$product->sub_category_id == null)
                            <span class="bg-info">{{$product->subcategory?->name}}</span>
                            @else
                            <span class="bg-warning">{{$product->category?->name}}</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Short Defination')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$product->shortDefination}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Description')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$product->description}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Test')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$product->test}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Result')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$product->result}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('How to Use')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$product->howToUse}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Pack')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$product->pack}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Ingredient')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$product->ingredient}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Weight')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$product->weight}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('PAO')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$product->pao}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Origin')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$product->origin}}</p>
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

<table class="table table-bordered table-hover align-middle">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('Color Name')}}</th>
            <th scope="col">{{__('ID')}}</th>
            <th scope="col">{{__('Code')}}</th>
            <th scope="col">{{__('Costing')}}</th>
            <th scope="col">{{__('Unit Price')}}</th>
            <th scope="col">{{__('Stock')}}</th>
            <th scope="col">{{__('Action')}}</th>
        </tr>
    </thead>
    <tbody>
        @if( $product->color !==null)

        @foreach($product->color as $color)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$color->name}}</td>
            <td>{{$color->id}}</td>
            <td>{{$color->code}}</td>
            <td>{{$color->costing}}</td>
            <td>{{$color->unitPrice}}</td>
            <td>{{$color->stock}}</td>
            <td>
                <a href="{{route('color.show',$color->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                <a href="{{route('color.edit',$color->id)}}" class="btn btn-sm link-warning"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                <a href="{{route('color.delete',$color->id)}}" class="btn btn-sm link-danger"><i class="fa-solid fa-trash fs-5"></i></a>
                <!-- Button trigger modal -->



            </td>

        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<hr>




@endsection