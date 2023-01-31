<!-- categoryCreateModal -->

<div class="mb-3">
    <label for="title" class="form-label">{{__('Slider Name')}}</label>
    <input type="text" class="form-control" id="title" name="title">
    @error('title') <small class="text-danger">{{$message}}</small> @enderror
</div>

<div class="form-floating mb-3">
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