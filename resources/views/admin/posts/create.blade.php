@extends('layouts.admin')

@section('content')
    <h1>Post create</h1>
    <div class="row">
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @include('includes.create_edit_posts_form')
        </form>
    </div>

    @include('includes.form_error')
@endsection