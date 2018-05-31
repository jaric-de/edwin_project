@extends('layouts.admin')

@section('content')
    <h1>Edit Category</h1>
    <div class="row">

    </div>
    <div class="col-sm-6">
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ old('name', $category->name) }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br/>
        @include('includes.form_error')
    </div>
@endsection