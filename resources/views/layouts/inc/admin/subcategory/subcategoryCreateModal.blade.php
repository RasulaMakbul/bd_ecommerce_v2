<!-- categoryCreateModal -->

<div class="mb-3">
    <label for="name" class="form-label">{{__('Subcategory Name')}}</label>
    <input type="text" class="form-control" id="name" name="name">
    @error('name') <small class="text-danger">{{$message}}</small> @enderror
</div>

<!-- dropdown -->
<div class="mb-3">
    <select name="category_id" class="block w-full mt-1 rounded-md">
        <option value="">{{__('Select Category')}}</option>
        @foreach ($category as $item)

        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>

</div>
<div class="mb-3">
    <label for="slug" class="form-label">{{__('Slug')}}</label>
    <input type="text" class="form-control" id="slug" name="slug">
    @error('slug') <small class="text-danger">{{$message}}</small> @enderror
</div>
<div class="form-floating">
    <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 100px"></textarea>
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