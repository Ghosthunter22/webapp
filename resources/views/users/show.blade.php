@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <b><h4 class="card-header">{{ $user->name }}</b>'s Profile</h4>

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
                                <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="100" height="100"/>
                                <h5 class="row justify-content-center" style="margin-top:10px">{{$user->name}}</h5>
                            </div>
                        </div>
            
                    </div>
                    <b><h5 class="card-header">{{ $user->name }}</b>'s Posts:</h5>
                <ul class="card-body">
                    @if(!empty($posts))
                        @foreach($posts as $post)
                        <div class="card" style="margin-block-end: 20px">
                            <h6 class="card-header"><a href="{{ route('posts.show', ['post_id' => $post->id]) }}">{{ $post->title }}</a></h6>
                        <div class="card-body">{{ $post->post }}</div>
                        </div>
                        @endforeach
                    @else
                    <h5 class="row justify-content-center">No posts!</h5>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection