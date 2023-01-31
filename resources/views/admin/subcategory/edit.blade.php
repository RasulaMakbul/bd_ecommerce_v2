@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">{{$subcategory->name}}</h2>
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
<form action="{{route('subcategory.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" class="form-control" id="id" name="id" value="{{$subcategory->id}}" hidden>
    <div class="mb-3">
        <label for="name" class="form-label">{{__('Subcategory Name')}}</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name',$subcategory->name)}}">
        @error('name') <small class=" text-danger">{{$message}}</small> @enderror
    </div>

    <!-- dropdown -->
    <div class="mb-3">
        <select name="category_id" class="block w-full mt-1 rounded-md">
            <option value="">{{__('Select Category')}}</option>
            @foreach ($category as $item)

            <option @selected($item->id == $subcategory->category_id)
                value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>

    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">{{__('Slug')}}</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',$subcategory->slug)}}">
        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 100px">{{$subcategory->description}}</textarea>
        <label for="description">{{(' Descroption')}}</label>
        @error('description') <small class="text-danger">{{$message}}</small> @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">{{__('Image')}}</label>
        <input type="file" class="form-control" id="image" name="image">
        @error('image') <small class="text-danger">{{$message}}</small> @enderror
    </div>
    <div class="mb-3">
        <input type="checkbox" id="status" name="status">
        <label class="form-label">{{__('Active')}}</label>
    </div>

    <div class="my-5">
        <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Update')}}</button>
        <a href="{{route('category.index')}}" class="btn btn-sm btn-outline-secondary">{{__('Close')}}</a>
    </div>

</form>



@endsection