@extends('layouts.admin')
@section('content')
    @if (session('success_message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Well done!</strong> {{ session('success_message') }}
        </div>
    @endif

    <h1>Users</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><img height="50" src="{{ $user->photo ? $user->photo->file : 'https://placehold.it/100x50' }}" alt=""/></td>
                    <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>
                        {!!$user->is_active ?
                        '<i class="fas fa-check-circle" style="margin-left: 15px"></i>' :
                         '<i class="fas fa-times-circle" style="margin-left: 15px"></i>' !!}
                    </td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection