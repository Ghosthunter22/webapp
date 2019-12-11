@extends('layouts.app')

@section('title', 'Comment')

@section('content')
<ul>
    <li>Comment: {{ $comment->comment }}</li>
</ul>

<form method="POST"
    action="{{ route('comments.destroy', ['id' => $comment->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>

<p><a href="{{ route('comments.index') }}">Back</a></p>
@endsection