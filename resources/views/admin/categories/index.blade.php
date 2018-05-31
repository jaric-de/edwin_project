@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>

    @include('includes._success_message')

    <div class="col-sm-6">
        <form method="POST" action="{{ route('categories.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br/>

        @include('includes.form_error')

    </div>
    <div class="col-sm-6">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td><a class="form-submit" data-instanceId="{{ route('categories.destroy', $category->id) }}" href="#"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

        @include('includes._deleteForm')

    </div>
@endsection