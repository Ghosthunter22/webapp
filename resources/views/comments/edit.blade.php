@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')

<div class="card" style="width:800px; margin-left:20px">
    <div class="card-header">
        Edit Comment
    </div>
    <div class="card-body">

<form method="POST" action="{{ route('comments.update', ['post_id' => $post_id]) }} ">
    @csrf
    <p>Comment: <input type="text" name="comment"
        value="{{ $comment->comment }}" class="form-control"></p>
    <input type="hidden" name="post_id" id="post_id" value="{{ $post_id }}" />
    <input type="hidden" name="comment_id" id="comment_id" value="{{ $comment->id }}" />
    <input type="submit" value="Edit Comment" class="btn btn-primary">
    <a href="{{ route('posts.show', ['post_id'=> $post_id]) }}">Cancel</a>
</form>
    </div>
</div>

@endsection