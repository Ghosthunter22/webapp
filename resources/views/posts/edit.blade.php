@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="card" style="width:800px; margin-left:20px">
    <div class="card-header">
        Edit Post
    </div>
    <div class="card-body">
<form method="POST" action="{{ route('posts.update', ['post_id' => $post->id]) }}" enctype="multipart/form-data">
    @csrf
    <p>Title:
    <textarea class="form-control" rows="1" style="width:520px" name="title">{{ $post->title }}</textarea>
    </p>
    <p>Post:
        <textarea class="form-control" rows="3" style="width:760px" name="post">{{ $post->post }}</textarea>
    </p>
        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />
        <div class="card-body">
            <p>Image (optional):
            <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp" value="{{$post->image}}">
                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
            </p>
        </div>
    <input type="submit" value="Edit Post" class="btn btn-primary">
    <a href="{{ route('posts.index') }}">Cancel</a>
</form>
    </div>
</div>


@endsection