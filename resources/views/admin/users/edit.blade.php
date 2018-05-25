@extends('layouts.admin')

@section('content')
    <h1>User edit</h1>
    <div class="row">
        <div class="col-sm-3">
            {{--<img src="{{ $user->photo ? $user->photo->file : '/images/placeholder-image.jpg' }}" alt="" class="img-responsive img-rounded"/>--}}
            <img style="height: 200px" src="{{ $user->photo ? $user->photo->file : 'https://placehold.it/400x400' }}" alt="" class="img-responsive img-rounded"/>
        </div>
        {!! Form::model($user, ['method' => 'PATCH','action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}

        @include('includes.create_edit_form')

        {!! Form::close() !!}
    </div>

        @include('includes.form_error')
@endsection