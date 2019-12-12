@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
                <div class="row justify-content-center">

                        <div class="profile-header-container">
                            <div class="profile-header-img">
                                <img class="rounded-circle" src="/storage/avatars/{{ $user->image }}" />
                                <!-- badge -->
                                <div class="rank-label-container">
                                    <span class="label label-default rank-label">{{$user->name}}</span>
                                </div>
                            </div>
                        </div>
            
                    </div>
                <div class="card-body">My Posts:</div>
                <ul class="card-body">
                    @if(!empty($posts))
                        @foreach($posts as $post)
                        <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></li>
                        @endforeach
                    @else
                    <a>No posts!</a>
                    @endif
                </ul>
                <div class="card-body"><a href="{{ route('posts.create') }}">Create Post</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
