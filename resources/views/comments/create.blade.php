@extends('layouts.app')

@section('title', 'Create Comment')

@section('content')

<form method="POST" action="{{ route('comments.store')}}">
    @csrf
    <p>Comment: <input type="text" name="comment" value="{{ old('comment') }}"></p>
    <input type="hidden" name="post_id" id="post_id" value="{{ $post_id }}" />
    <input type="submit" value="Submit">
    <a href="{{ route('posts.show', ['post_id'=> $post_id]) }}">Cancel</a>
</form>

@endsection