@extends('layouts.admin')

@section('content')
    <h1>User edit</h1>
    <div class="row">
        <div class="col-sm-3">
            <img style="height: 200px" src="{{ $user->photo ? $user->photo->file : 'https://placehold.it/400x400' }}" alt="" class="img-responsive img-rounded"/>
        </div>
        <div class="col-sm-8">

            {!! Form::model($user, ['method' => 'PATCH','action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}

            @include('includes.create_edit_form')

            {!! Form::close() !!}

        </div>
        <div class="row">
            <form method="POST" id="user_delete_form" action="{{ route('users.destroy', $user->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete" />
                <button class="btn btn-danger" type="submit">Delete User</button>
            </form>
        </div>
    </div>

    @include('includes.form_error')
@endsection