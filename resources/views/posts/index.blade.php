@extends('layouts.app')
@php
use App\User;
$userRoles = User::findOrFail(auth()->id())->roles->pluck('name');    
@endphp
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
<ul class="pagination" style="width:0px">
    <div class="container">
    @foreach($posts as $post)
    <div class="card" style="margin-bottom:20px; margin-left:20px; width:800px">
        <h5 class="card-header">
            <img class="rounded-circle" src="/storage/avatars/{{ $post->user()->get()->first()->avatar }}" width="35" height="35"/>
            @if($post->user->id == auth()->id())
                <a href="{{ route('profile') }}" {{ $post->user->name }}>{{ $post->user()->get()->first()->name }}</a> 
            @else
                <a href="{{ route('users.show', ['id' => $post->user_id]) }}">{{ $post->user()->get()->first()->name }}</a>
            @endif
        </h5>
        <h5 class="modal-header">
            {{ $post->title }}
        </h5>
        @if(!(($post->image) == null))
        <div class="modal-header">
            @if(strpos(($post->image), 'image')!==false)
            <img src="/storage/images/{{ $post->image }}"/>
            @else
            <img src="{{$post->image}}" />
            @endif
        </div>
        @endif
        <div class="card-body">
            {{ $post->post }}
        </div>
        <a href="{{ route('posts.show', ['post_id' => $post->id]) }}" class="card-body" style="display:inline-block"><button type="submit" class="btn btn-primary">Read More</button></a>
        @if($post->user_id == auth()->id() || $userRoles->contains('admin'))
            <div class="card-footer">  
                <a href="{{ route('posts.edit', ['post_id' => $post->id]) }}"><button class="btn btn-secondary" style="display:inline-block">Edit</button>
                <form method="POST" style="display:inline-block"
                    action="{{ route('posts.destroy', ['post_id' => $post->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
         @endif
    </div>   
    @endforeach
    <div class="container" style="margin-top:40px;">
    {{ $posts->links() }}
</ul>   
@endsection