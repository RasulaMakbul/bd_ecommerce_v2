@extends('layouts.admin')
@section('title','Slider')

@section('content')

<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">{{('Sliders')}}</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-outline-secondary mx-3" data-bs-toggle="modal" data-bs-target="#sliderCreate">
                <i class="fa-duotone fa-plus"></i> {{__('Create')}}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="sliderCreate" tabindex="-1" aria-labelledby="sliderCreateLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="sliderCreateLabel">{{__('Create Slider')}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('layouts.inc.admin.slider.createModal')

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Save')}}</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div>
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('Image')}}</th>
                    <th scope="col">{{__('title')}}</th>
                    <th scope="col">{{__('description')}}</th>
                    <th scope="col">{{__('status')}}</th>
                    <th scope="col">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sliders as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td class="tableImage"><img src="{{asset('storage/slider/'.$item->image)}}" alt=""></td>
                    <td>{{$item->title}}</td>
                    <td class="col-4">{{$item->description}}</td>
                    <td>@if($item->status==0)

                        <a href="{{route('slider.inactive',$item->id)}}" class="btn btn-sm link-danger">{{__('Hidden')}}</a>
                        @else

                        <a href="{{route('slider.active',$item->id)}}" class="btn btn-sm link-success">{{__('Visible')}}</a>
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                        <a href="{{route('slider.delete',$item->id)}}" class=" btn btn-sm link-danger" comment="Delete Category"><i class="fa-solid fa-trash fs-5"></i></a>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>


@push('scripts')
@endpush

@endsection