@extends('layouts.app')

@section('title', 'Post')

@section('content')
<div class="card-body">
    <a href="{{ route('posts.index') }}"><button type="submit" class="btn btn-primary">Back to posts</button></a>
</div>
<div class="card" style="margin-left:10px; width:1000px">
<div class="card-header"><a href="{{ route('users.show', ['id' => $user->id]) }}"><img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="40" height="40"/>{{ $user->name }}</a></div>
    <h5 class="modal-header"></a>{{ $post->title }}</h5> 
    <div class="card-body">{{ $post->post }}</div>    
    @if($post->user_id == auth()->id())
    <div class="card-footer">
    <form method="POST"
        action="{{ route('posts.destroy', ['post_id' => $post->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    </div>
    @endif
    </div>
    <div>
<ul>
        @if(!empty($comments))  
        <h5 style="margin-top:10px">Comments:</h5>
            @foreach($comments as $comment)
            <div style="margin-block-start:10px; width:800px">
                <div class="card">
                <div class="card-header"><a href="{{ route('users.show', ['id' => $comment->user_id]) }}">
                        <img class="rounded-circle" src="/storage/avatars/{{ $comment->user()->get()->first()->avatar }}" width="30" height="30"/>
                        {{ $comment->user()->get()->first()->name }}</a></div>
                <div class="card-body">{{ $comment->comment }}</div>
                <div class="card-footer">
                @if($comment->user_id == auth()->id())
                <div style="width:400px">  
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
                </div>
            </div>
            @endforeach
            </div>
        @else
            <p>No comments!</p>
        @endif
    </ul>
    <div class="card-body"><a href="{{ route('comments.create', ['post_id' => $post->id]) }}"><button type="submit" class="btn btn-primary">Comment</button></a>
    </div>
@endsection