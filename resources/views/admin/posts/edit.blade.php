@extends('layouts.admin')

@section('content')
    <h1>Post edit</h1>
    <div class="row">
        <div class="col-sm-6">
            <img class="img-responsive" src="{{ $post->photo->file }}" alt=""/>
        </div>
        
        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @include('includes.create_edit_posts_form')
        </form>
    </div>

    <div class="row">
        <form method="POST" id="post_delete_form" action="{{ route('posts.destroy', $post->id) }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button class="btn btn-danger" type="submit">Delete Post</button>
        </form>
    </div>

    @include('includes.form_error')
@endsection