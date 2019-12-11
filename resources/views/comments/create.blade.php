@extends('layouts.app')

@section('title', 'Create Comment')

@section('content')
<form method="POST" action="{{ route('comments.store') }}">
    @csrf
    <p>Comment: <input type="text" name="comment"
        value="{{ old('comment') }}"></p>
    <input type="submit" value="Submit">
    <a href="{{ route('comments.index') }}">Cancel</a>
</form>

@endsection