@extends('layouts.app')

@section('title', 'Create Comment')

@section('content')

<div class="card" style="width:800px; margin-left:20px">
    <div class="card-header">
        Create Comment
    </div>
    <div class="card-body">

<form method="POST" action="{{ route('comments.store')}}">
    @csrf
    <p>Comment: <input type="text" name="comment"
        value="{{ old('comment') }}" class="form-control"></p>
    <input type="hidden" name="post_id" id="post_id" value="{{ $post_id }}" />
    <input type="submit" value="Create Comment" class="btn btn-primary">
    <a href="{{ route('posts.show', ['post_id'=> $post_id]) }}">Cancel</a>
</form>
    </div>
</div>

@endsection