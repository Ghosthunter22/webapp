@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="modal-header">
    <h2>Posts on Postr:</h2>
</div>
<div class="card-body" style="margin-left:20px">    
    <a href="{{ route('posts.create') }}">
        <button class="btn btn-primary">Create Post</button>
    </a>
</div>
<ul>
    @foreach($posts as $post)
    <div class="card" style="margin-top:20px; margin-left:20px; width:800px">
        <h5 class="card-header">
            <img class="rounded-circle" src="/storage/avatars/{{ $post->user()->get()->first()->avatar }}" width="35" height="35"/>
            <a href="{{ route('users.show', ['id' => $post->user_id]) }}">
                {{ $post->user()->get()->first()->name }}
            </a>
        </h5>
        <h5 class="modal-header">
            {{ $post->title }}
        </h5>
        <div class="card-body">
            {{ $post->post }}
        </div>
        <a href="{{ route('posts.show', ['post_id' => $post->id]) }}" class="card-body" style="display:inline-block"><button type="submit" class="btn btn-primary">Read More</button></a>
        @if($post->user_id == auth()->id())
            <div class="card-footer">  
                <button type="submit" style="display:inline-block">Edit</button>
                <form method="POST" style="display:inline-block"
                    action="{{ route('posts.destroy', ['post_id' => $post->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
         @endif
    </div>   
    @endforeach
</ul>   
@endsection