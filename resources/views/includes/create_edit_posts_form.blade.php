{{ csrf_field() }}
<div class="col-sm-9">
    <div class="form-group">
        <label for="title">Title</label>
        <input name="title" type="text" class="form-control" id="title" placeholder="Enter title">
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" class="form-control" id="category_id">
            <option value="" selected disabled>Please select</option>
            @foreach($categories as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
            {{--<option value="1">PHP</option>--}}
            {{--<option value="2">Javascript</option>--}}
            {{--<option value="3">Ruby</option>--}}
            {{--<option value="3">Python</option>--}}
            {{--<option value="5">HTML</option>--}}
        </select>
    </div>

    <div class="form-group">
        <label for="body">Description</label>
        <textarea name="body" class="form-control" id="body" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="photo_id">Image</label>
        <input type="file" name="photo_id" class="form-control-file" id="photo_id">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>