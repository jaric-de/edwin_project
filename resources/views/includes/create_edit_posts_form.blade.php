{{ csrf_field() }}
<div class="col-sm-9">
    <div class="form-group">
        <label for="title">Title</label>
        <input name="title" type="text" class="form-control" id="title" placeholder="Enter title" value="{{ old('title', $post->title) }}">
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" class="form-control" id="category_id">
            <option value="" selected disabled>Please select</option>
            @foreach($categories as $key => $value)

                {{--@if(old('category_id'))--}}
                    {{--<option {{ $key == old('category_id') ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>--}}
                {{--@else--}}
                    {{--<option {{ $key == $post->category_id ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>--}}
                {{--@endif--}}

                <option {{ $key == old('category_id', $post->category_id)  ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>

                {{--<option {{ $key == $post->category_id ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>--}}
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="body">Description</label>
        <textarea name="body" class="form-control" id="body" rows="3">{{ old('body', $post->body) }}</textarea>
    </div>

    <div class="form-group">
        <label for="photo_id">Image</label>
        <input type="file" name="photo_id" class="form-control-file" id="photo_id">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>