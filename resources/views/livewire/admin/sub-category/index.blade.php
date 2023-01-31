<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">{{('Subcategories')}}</h2>
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
            <button type="button" class="btn btn-sm btn-outline-secondary mx-3" data-bs-toggle="modal" data-bs-target="#subcategoryCreate">
                <i class="fa-duotone fa-plus"></i> {{__('Create')}}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="subcategoryCreate" tabindex="-1" aria-labelledby="subcategoryCreateLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="subcategoryCreateLabel">{{__('Create SubCcategory')}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('subcategory.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('layouts.inc.admin.subcategory.subcategoryCreateModal')

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
                    <th scope="col">{{__('Subcategory')}}</th>
                    <th scope="col">{{__('Category')}}</th>
                    <th scope="col">{{__('Slug')}}</th>
                    <th scope="col">{{__('status')}}</th>
                    <th scope="col">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcategory as $key=>$item)
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

        {{$subcategory->links()}}

    </div>
</div>


@push('scripts')
@endpush