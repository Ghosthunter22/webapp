@extends('layouts.app')

@section('title', 'Post')

@section('content')
<div>Post: 
    <p>{{ $post->post }}</p>    
    </div>
<ul class="card-body">
        @if(!empty($comments))
            @foreach($comments as $comment)
                <li><a href="{{ route('comments.show', ['id' => $comment->id]) }}">{{ $comment->comment }}</a></li>
            @endforeach
        @else
            <a>No comments!</a>
        @endif
    </ul>

<form method="POST"
    action="{{ route('posts.destroy', ['id' => $post->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>

<p><a href="{{ route('posts.index') }}">Back</a></p>
@endsection