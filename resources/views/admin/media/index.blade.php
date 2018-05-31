@extends('layouts.admin')

@section('content')
    <h1>Media</h1>

    @include('includes._success_message')

    @if($photos)
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{ $photo->id }}</td>
                    <td><img height="50px" src="{{ $photo->file }}" alt=""/>{{ $photo->file }}</td>
                    <td>{{ $photo->created_at->diffFOrHumans() }}</td>
                    <td><a class="form-submit" data-instanceId="{{ route('media.destroy', $photo->id) }}" href="#"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('includes._deleteForm')
    @endif
@endsection