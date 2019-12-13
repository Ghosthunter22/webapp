@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<p class="card-header">Posts on Postr:</p>
<ul>
    @foreach($posts as $post)
    <div class="card-header">
        <p class="card-header">
                <img class="rounded-circle" src="/storage/avatars/{{ $post->user()->get()->first()->avatar }}" width="40" height="40"/><a href="{{ route('users.show', ['id' => $post->user_id]) }}">{{ $post->user()->get()->first()->name }}</a>
        </p>
    <div><a href="{{ route('posts.show', ['post_id' => $post->id]) }}">{{ $post->title }}</a></div>
    <p class="card-body">{{ $post->post }}</p>
    </div>
    @endforeach
</ul>   
<a href="{{ route('posts.create') }}">Create Post</a>
@endsection