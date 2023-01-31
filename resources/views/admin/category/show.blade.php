@extends('layouts.admin')
@section('title','Category')

@section('content')
<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">{{$category->name}}</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>

            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#colorCreateModal">
                <i class="fa-solid fa-pen-to-square"></i></i> {{__('edit Category')}}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="colorCreateModal" tabindex="-1" aria-labelledby="colorCreateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="colorCreateModalLabel">{{__('edit Category')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="text" class="form-control" id="id" name="id" value="{{$category->name}}" hidden>
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{__('Category Name')}}</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$category->name)}}">
                                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">{{__('Slug')}}</label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{old('name',$category->slug)}}">
                                    @error('slug') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 100px">{{old('description',$category->description)}}</textarea>
                                    <label for="description">{{(' Descroption')}}</label>
                                    @error('description') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">{{__('Image')}}</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <img src="{{asset('storage/category/'.$category->image)}}" alt="" width="60px" height="60px">
                                    @error('image') <small class="text-danger">{{$message}}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <h4>{{__('SEO TAGS')}}</h4>
                                </div>
                                <div class="mb-3">
                                    <label for="meta_title" class="form-label">{{__('Meta Title')}}</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{old('meta_title',$category->meta_title)}}">
                                    @error('meta_title') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class=" mb-3">
                                    <label for="meta_keyword" class="form-label">{{__('Meta Keyword')}}</label>
                                    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{old('meta_keyword',$category->meta_keyword)}}">
                                    @error('meta_keyword') <small class=" text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="meta_description" class="form-label">{{__('Meta Description')}}</label>
                                    <input type="text" class="form-control" id="meta_description" name="meta_description" value="{{old('meta_description',$category->meta_description)}}">
                                    @error('meta_description') <small class=" text-danger">{{$message}}</small> @enderror
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
                            <li>
                                <img src="{{asset('storage/category/'.$category->image)}}" alt="multiple image" class=" border border-blue-600">
                            </li>
                        </ul>
                    </div>

                </div>
            </div>



        </div>
        <div class="col">
            <h2>{{$category->name}}</h2>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Slug')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$category->slug}}</p>
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
                        <p>
                            {{$category->description}}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Meta Title')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$category->meta_title}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Meta Keyword')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$category->meta_keyword}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5>{{__('Meta Description')}}</h5>
                    </div>
                    <div class="col-1">
                        <h5>{{__(':')}}</h5>
                    </div>
                    <div class="col-8">
                        <p>{{$category->meta_description}}</p>
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

<h5>{{__('Sub Categories')}}</h5>
<hr>

<table class="table table-bordered table-hover align-middle">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('Image')}}</th>
            <th scope="col">{{__('Subcategory')}}</th>
            <th scope="col">{{__('Category')}}</th>
            <th scope="col">{{__('Slug')}}</th>
            <th scope="col">{{__('status')}}</th>
            <th scope="col">{{__('Action')}}</th>
        </tr>
    </thead>
    <tbody>
        @if( $category->subcategory !==null)

        @forelse($category->subcategory as $item)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td class="tableImage"><img src="{{asset('storage/subcategory/'.$item->image)}}" alt=""></td>
            <td>{{$item->name}}</td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->slug}}</td>
            <td>@if($item->status==0)

                <a href="{{route('subcategory.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Visible')}}</a>
                @else

                <a href="{{route('subcategory.active',$item->id)}}" class="btn btn-sm link-success">{{__('Hidden')}}</a>
                @endif
            </td>
            <td>
                <a href="{{route('subcategory.show',$item->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                <a href="{{route('subcategory.edit',$item->id)}}" class=" btn btn-sm link-warning" comment="edit subcategory"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                <a href="{{route('subcategory.delete',$item->id)}}" class=" btn btn-sm link-danger" comment="Delete subcategory"><i class="fa-solid fa-trash fs-5"></i></a>


            </td>
        </tr>
        @empty
        <div class="col-md-12">
            <h4>{{__('No Subcategories available')}}</h4>
        </div>
        @endforelse
        @endif
    </tbody>
</table>
<hr>

<h5>{{__('Products')}}</h5>
<hr>
<table class="table table-bordered table-hover align-middle">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('Name')}}</th>
            <th scope="col"><span class="bg-warning">{{__('Category')}}</span></th>
            <th scope="col">{{__('code')}}</th>
            <th scope="col">{{__('Slug')}}</th>
            <th scope="col">{{__('trending')}}</th>
            <th scope="col">{{__('status')}}</th>
            <th scope="col">{{__('Action')}}</th>
        </tr>
    </thead>
    <tbody>
        @if( $category->product !==null)
        @forelse($category->product as $key=>$item)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$item->name}}</td>
            <td>
                @if(!$item->sub_category_id == null)
                <span class="bg-info">{{$item->subcategory?->name}}</span>
                @else
                <span class="bg-warning">{{$item->category?->name}}</span>
                @endif
            </td>


            <td>{{$item->code}}</td>
            <td>{{$item->slug}}</td>
            <td>@if($item->status==0)

                <a href="{{route('product.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Visible')}}</a>
                @else

                <a href="{{route('product.active',$item->id)}}" class="btn btn-sm link-success">{{__('Hidden')}}</a>
                @endif
            </td>
            <td>@if($item->trending==0)

                <a href="{{route('product.notTrending',$item->id)}}" class="btn btn-sm link-danger">{{__('Trending')}}</a>
                @else

                <a href="{{route('product.trending',$item->id)}}" class="btn btn-sm link-success">{{__('Not Ternding')}}</a>
                @endif
            </td>
            <td>
                <a href="{{route('product.show',$item->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                <a href="{{route('product.edit',$item->id)}}" class=" btn btn-sm link-warning" comment="edit subcategory"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                <a href="{{route('product.delete',$item->id)}}" class=" btn btn-sm link-danger" comment="Delete subcategory"><i class="fa-solid fa-trash fs-5"></i></a>
                <!-- <form action="{{ route('category.delete', $item->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</button>
                        </form> -->

            </td>
        </tr>
        @empty
        <div class="col-md-12">
            <h4>{{__('No Products available')}}</h4>
        </div>
        @endforelse
        @endif

        @endsection