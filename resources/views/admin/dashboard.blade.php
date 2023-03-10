@extends('layouts.admin')
@section('title','Dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
        </button>
    </div>
</div>


<h2>{{__('Categories')}}</h2>
<div class="table-responsive mb-5">
    <table class="table table-bordered table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('Image')}}</th>
                <th scope="col">{{__('Category')}}</th>
                <th scope="col">{{__('Slug')}}</th>
                <th scope="col">{{__('status')}}</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $key=>$item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td class="tableImage"><img src="{{asset('storage/category/'.$item->image)}}" alt=""></td>
                <td>{{$item->name}}</td>
                <td>{{$item->slug}}</td>
                <td>@if($item->status==0)

                    <a href="{{route('category.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Visible')}}</a>
                    @else

                    <a href="{{route('category.active',$item->id)}}" class="btn btn-sm link-success">{{__('Hidden')}}</a>
                    @endif
                </td>
                <td>
                    <a href="{{route('category.show',$item->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                    <a href="{{route('category.edit',$item->id)}}" class=" btn btn-sm link-warning" comment="Edit Category"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                    <a href="{{route('category.delete',$item->id)}}" class=" btn btn-sm link-danger" comment="Delete Category"><i class="fa-solid fa-trash fs-5"></i></a>
                    <!-- <form action="{{ route('category.delete', $item->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</button>
                        </form> -->

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<h2>{{__('Sub Categories')}}</h2>
<div class="table-responsive mb-5">
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
            @foreach($subcategories as $key=>$item)
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
                    <a href="#" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                    <a href="{{route('subcategory.edit',$item->id)}}" class=" btn btn-sm link-warning" comment="Edit subcategory"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                    <a href="{{route('subcategory.delete',$item->id)}}" class=" btn btn-sm link-danger" comment="Delete subcategory"><i class="fa-solid fa-trash fs-5"></i></a>
                    <!-- <form action="{{ route('category.delete', $item->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</button>
                        </form> -->

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<h2>{{__('Products')}}</h2>
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('Name')}}</th>
                <th scope="col"><span class="bg-warning">{{__('Category')}}</span>{{__('/')}}<span class="bg-info">{{__('Subcategory')}}</span></th>
                <th scope="col">{{__('code')}}</th>
                <th scope="col">{{__('Slug')}}</th>
                <th scope="col">{{__('trending')}}</th>
                <th scope="col">{{__('status')}}</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key=>$item)
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
                    <a href="{{route('product.edit',$item->id)}}" class=" btn btn-sm link-warning" comment="Edit subcategory"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
                    <a href="{{route('product.delete',$item->id)}}" class=" btn btn-sm link-danger" comment="Delete subcategory"><i class="fa-solid fa-trash fs-5"></i></a>
                    <!-- <form action="{{ route('category.delete', $item->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</button>
                        </form> -->

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection