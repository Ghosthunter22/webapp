@extends('layouts.app')

@section('title', 'Post')

@section('content')
<div class="card-body">
    <a href="{{ route('posts.index') }}"><button type="submit" class="btn btn-primary">Back to posts</button></a>
</div>
<div class="card" style="margin-left:10px; width:1000px">
<h3 class="card-header"><a href="{{ route('users.show', ['id' => $user->id]) }}"><img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="40" height="40"/> {{ $user->name }}</a></h3>
    <h5 class="modal-header"></a>{{ $post->title }}</h5> 
@if(!(($post->image) == null))
    <div class="modal-header">
        @if(strpos(($post->image), 'image')!==false)
        <img src="/storage/images/{{ $post->image }}"/>
        @else
        <img src="{{$post->image}}" />
        @endif
    </div>
    @endif
    <div class="card-body">{{ $post->post }}</div> 
    @php
    use App\User;
    try{
    $userRoles = User::findOrFail(auth()->id())->roles->pluck('name');    
    }catch(Exception $e){
    }
    @endphp   
    @if($post->user_id == auth()->id() )
    @isset($userRoles)
    @if($userRoles->contains('admin'))
    <div class="card-footer">
        <div style="width:400px">  
            <div style="float: left; width: 0px">
                <a href="{{ route('posts.edit', ['post_id' => $post->id]) }}"><button class="btn btn-secondary">Edit</button></a>
            </div>
            <div style="float: right; width: 340px">
                <form method="POST"
                action="{{ route('posts.destroy', ['post_id' => $post->id]) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        @endif
        @endisset
    @endif
    </div>
</div>
    <div style="margin-left:20px">
<h5 style="margin-top:10px">Comments:</h5>

<ul class="pagination"> 
        @if(!(($comments->first()) == null))
            @foreach($comments as $comment)
            <div style="margin-block-start:10px; width:800px">
                <div class="card">
                    @if($post->user->id == auth()->id())
                    <h6 class="card-header"><a href="{{ route('profile') }}">
                    @else
                    <h6 class="card-header"><a href="{{ route('users.show', ['id' => $comment->user_id]) }}">
                        @endif
                    <img class="rounded-circle" src="/storage/avatars/{{ $comment->user()->get()->first()->avatar }}" width="30" height="30"/>
                        {{ $comment->user()->get()->first()->name }}</a></h6>
                        
                <div class="card-body">{{ $comment->comment }}</div>
                
                @if($comment->user_id == auth()->id())
                @isset($userRoles)
                @if($userRoles->contains('admin'))
                <div class="card-footer">
                <div style="width:400px">  
                    <div style="float: left; width: 0px">
                <a href="{{ route('comments.edit', ['post_id' => $post->id, 'comment_id' => $comment->id]) }}"><button class="btn btn-secondary">Edit</button>
                    </div>
                    <div style="float: right; width: 340px">
                <form method="POST"
                action="{{ route('comments.destroy', ['post_id' => $post->id, 'comment_id' => $comment->id]) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
                </form>
                    </div>
                </div>
            </div>
            @endif
            @endisset
                @endif
                
            </div>
            @endforeach
            </div>
        @else
            <p>No comments yet! Be the first one to comment.</p>
        @endif
    </ul>
    <div class="card-body"><a href="{{ route('comments.create', ['post_id' => $post->id]) }}"><button type="submit" class="btn btn-primary">Comment</button></a>
    </div>
    </div>
@endsection