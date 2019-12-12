@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <p>Title: <input type="text" name="title"
        value="{{ old('title') }}"></p>
    <p>Post: <input type="text" name="post"
        value="{{ old('post') }}"></p>
    <input type="submit" value="Submit">
    <a href="{{ route('posts.index') }}">Cancel</a>
</form>

@endsection