@extends('layouts.app')

@section('title', 'Post')

@section('content')
<div>
<div class="card-header"><img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="40" height="40"/><a href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->name }}</a></div>
    <div class="card-header"></a>{{ $post->title }}</div> 
    <p class="card-body">{{ $post->post }}</p>    
    </div>
<ul class="card-body">
        @if(!empty($comments))  
            @foreach($comments as $comment)
                <p class="card-header"><a href="{{ route('users.show', ['id' => $comment->user_id]) }}">
                        <img class="rounded-circle" src="/storage/avatars/
                        {{ $comment->user()->get()->first()->avatar }}" width="20" height="20"/>
                        {{ $comment->user()->get()->first()->name }}</a></p>
                <p>{{ $comment->comment }}</p>
                @if($comment->user_id == auth()->id())
                <div style="width:400px;">  
                    <div style="float: left; width: 0px">
                <button type="submit">Edit</button>
                    </div>
                    <div style="float: right; width: 350px">
                <form method="POST"
                action="{{ route('comments.destroy', ['post_id' => $post->id, 'comment_id' => $comment->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
                </form>
                    </div>
                </div>
                @endif
            @endforeach
        @else
            <p>No comments!</p>
        @endif
    </ul>
    <div class="card-body"><a href="{{ route('comments.create', ['post_id' => $post->id]) }}"><button type="submit" class="btn btn-primary">Comment</button></a>
    </div>
    @if($post->user_id == auth()->id())
    <div class="card-body">
    <form method="POST"
        action="{{ route('posts.destroy', ['post_id' => $post->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    </div>
    @endif

<p><a href="{{ route('posts.index') }}">Back</a></p>
@endsection