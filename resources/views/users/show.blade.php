@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
                                <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" />
                                <!-- badge -->
                                <div class="rank-label-container">
                                    <span class="label label-default rank-label">{{$user->name}}</span>
                                </div>
                            </div>
                        </div>
            
                    </div>
                <div class="card-body">{{ $user->name }} 's Posts:</div>
                <ul class="card-body">
                    {{-- @if(!empty($posts)) --}}
                        @foreach($posts as $post)
                            <li><a href="{{ route('posts.show', ['post_id' => $post->id]) }}">{{ $post->title }}</a></li>
                        @endforeach
                    {{-- @else
                        <a>No posts!</a>
                    @endif --}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection