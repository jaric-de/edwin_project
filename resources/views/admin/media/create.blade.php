@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css"/>
@endsection


@section('content')
    <h1>Create Media</h1>

    <form method="POST" action="{{ route('media.store') }}" class="dropzone">
        {{ csrf_field() }}
    </form>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js" type="text/javascript"></script>
@endsection