@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<div class="card" style="width:800px; margin-left:20px">
    <div class="card-header">
        Create Post
    </div>
    <div class="card-body">
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf
    <p>Title: <input type="textarea" name="title"
        value="{{ old('title') }}" class="form-control"></p>
    <p>Post: <input type="textarea" name="post"
        value="{{ old('post') }}" class="form-control"></p>
        <div class="card-body">
            <p>Image (optional):
                <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
            </p>
        </div>
    <input type="submit" value="Create Post" class="btn btn-primary">
    <a href="{{ route('posts.index') }}">Cancel</a>
</form>
    </div>
</div>


@endsection