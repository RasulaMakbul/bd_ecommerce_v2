@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">{{__('Create Product')}}</h2>

</div>
<form action="{{route('product.update',$product)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">{{__('Home')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">{{('SEO Tags')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">{{('Image')}}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">{{__('Product Name')}}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$product->name)}}">
                    @error('name') <small class=" text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="code" class="form-label">{{__('Product Code')}}</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{old('code',$product->code)}}">
                    @error('code') <small class=" text-danger">{{$message}}</small> @enderror
                </div>

                <!-- dropdown -->
                <div class="row">
                    <div class="col-md-3">

                        <div class="form-group mb-3">
                            <select name="category_id" class="block w-full mt-1 rounded-md">
                                <option value="">{{__('Select Category')}}</option>
                                @foreach ($category as $item)

                                <option @selected($item->id == $product->category_id)
                                    value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4>{{__('Or')}}</h4>
                    </div>
                    <div class="col-md-3">

                        <div class="form-group mb-3">
                            <select name="sub_category_id" class="block w-full mt-1 rounded-md">
                                <option value="">{{__('Select Subcategory')}}</option>
                                @foreach ($subcategory as $item)

                                <option @selected($item->id == $product->sub_category_id)
                                    value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="slug" class="form-label">{{__('Slug')}}</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',$product->slug)}}">
                    @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="shortDefination" class="form-label">{{__('Short Defination')}}</label>
                    <input type="text" class="form-control" id="shortDefination" name="shortDefination" value="{{old('shortDefination',$product->shortDefination)}}">
                    @error('shortDefination') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 100px">{{$product->description}}</textarea>
                    <label for="description">{{__(' Descroption')}}</label>
                    @error('description') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="test" id="test" name="test" style="height: 100px">{{$product->test}}</textarea>
                    <label for="test">{{__(' Test')}}</label>
                    @error('test') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="result" id="result" name="result" style="height: 100px">{{$product->result}}</textarea>
                    <label for="result">{{(' Result')}}</label>
                    @error('result') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="howToUse" id="howToUse" name="howToUse" style="height: 100px">{{$product->howToUse}}</textarea>
                    <label for="howToUse">{{(' How To Use')}}</label>
                    @error('description') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="pack" id="pack" name="pack" style="height: 100px">{{$product->pack}}</textarea>
                    <label for="pack">{{('Pack')}}</label>
                    @error('description') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="ingredient" id="ingredient" name="ingredient" style="height: 100px">{{$product->ingredient}}</textarea>
                    <label for="ingredient">{{('Ingredient')}}</label>
                    @error('ingredient') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="weight" class="form-label">{{__('Weight')}}</label>
                    <input type="text" class="form-control" id="weight" name="weight" value="{{old('weight',$product->weight)}}">
                    @error('weight') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="pao" class="form-label">{{__('pao')}}</label>
                    <input type="text" class="form-control" id="pao" name="pao" value="{{old('pao',$product->pao)}}">
                    @error('pao') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="origin" class="form-label">{{__('Origin')}}</label>
                    <input type="text" class="form-control" id="origin" name="origin" value="{{old('origin',$product->origin)}}">
                    @error('origin') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="checkbox" id="status" name="status">
                    <label class="form-label">{{__('Active')}}</label>
                </div>

            </div>
            <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                <div class="form-group mb-3">
                    <label for="meta_title" class="form-label">{{__('Meta Title')}}</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{old('meta_title')}}">
                    @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="meta_keyword" class="form-label">{{__('Meta Keyword')}}</label>
                    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{old('meta_keyword')}}">
                    @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="meta_description" class="form-label">{{__('Meta Description')}}</label>
                    <input type="text" class="form-control" id="meta_description" name="meta_description" value="{{old('meta_description')}}">
                    @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="checkbox" id="trending" name="trending">
                    <label class="form-label">{{__('Trending')}}</label>
                </div>
            </div>
            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">

                <div class="form-group my-3">
                    <label for="image" class="form-label"><strong>{{__('Upload product Images')}}</strong></label>
                    <input type="file" multiple class="form-control" id="image" name="image[]">
                    @error('image') <small class="text-danger">{{$message}}</small> @enderror
                </div>
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
        </div>
    </div>





    <div class="my-5">
        <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Update')}}</button>
        <a href="{{route('product.index')}}" class="btn btn-sm btn-outline-secondary">{{__('Close')}}</a>
    </div>

</form>



@endsection