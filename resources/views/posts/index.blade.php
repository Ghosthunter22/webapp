@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<p>Posts on Postr:</p>
<ul>
    @foreach($posts as $post)
    <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->id }}</a></li>
    @endforeach
</ul>
<a href="{{ route('posts.create') }}">Create Post</a>
@endsection