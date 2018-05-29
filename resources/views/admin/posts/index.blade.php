@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        </thead>
        <tbody>
        {{--{{ phpinfo() }}--}}
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><img height="50" src="{{ $post->photo ? $post->photo->file : 'https://placehold.it/100x50' }}" alt=""/></td>
                    <td><a href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a></td>
                    <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                    <td><a href="{{--{{ route('users.edit', $user->id) }}--}}">{{ $post->title }}</a></td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection