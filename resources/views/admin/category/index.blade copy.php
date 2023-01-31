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
        <tr>
            @foreach($categories as $item)
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
            <td>status</td>
            @endforeach
        </tr>
    </tbody>
</table>







<a href="{{route('category.delete',$item->id)}}" class="btn btn-sm link-danger">{{__('Confirm')}}</a>