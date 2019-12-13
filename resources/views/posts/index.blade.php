@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<p class="card-header">Posts on Postr:</p>
<ul>
    <div class="card-body">    
    <a href="{{ route('posts.create') }}"><button type="submit" class="btn btn-primary">Create Post</button></a>
    </div>
    @foreach($posts as $post)
    <div class="card-header">
        <p class="card-header">
                <img class="rounded-circle" src="/storage/avatars/{{ $post->user()->get()->first()->avatar }}" width="40" height="40"/><a href="{{ route('users.show', ['id' => $post->user_id]) }}">{{ $post->user()->get()->first()->name }}</a>
        </p>
    <div><a href="{{ route('posts.show', ['post_id' => $post->id]) }}">{{ $post->title }}</a></div>
    <p class="card-body">{{ $post->post }}</p>
    @if($post->user_id == auth()->id())
                <div style="width:400px;">  
                    <div style="float: left; width: 0px">
                <button type="submit">Edit</button>
                    </div>
                    <div style="float: right; width: 350px">
                <form method="POST"
                action="{{ route('posts.destroy', ['post_id' => $post->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
                </form>
                    </div>
                </div>
                @endif    
</div>
    @endforeach
</ul>   
@endsection