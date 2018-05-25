@extends('layouts.admin')

@section('content')
    <h1>User create</h1>
    <div class="row">
        {!! Form::open(['method' => 'POST','action' => 'AdminUsersController@store', 'files' => true]) !!}

        @include('includes.create_edit_form')

        {!! Form::close() !!}
    </div>

    @include('includes.form_error')
@endsection