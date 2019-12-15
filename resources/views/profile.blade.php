@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">Profile</h4>

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
                    
                <h5 class="card-header">My Posts:</h5>
                <ul class="card-body">
                    @if(!empty($posts))
                    <div>
                        @foreach($posts as $post)
                        <div class="card" style="margin-block-end: 20px">
                            <h6 class="card-header"><a href="{{ route('posts.show', ['post_id' => $post->id]) }}">{{ $post->title }}</a></h6>
                        <div class="card-body">{{ $post->post }}</div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <h5 class="row justify-content-center">No posts!</h5>
                    @endif
                </ul>
                <div class="row justify-content-center">
                    <a href="{{ route('posts.create') }}"><button type="submit" class="btn btn-primary" style="margin-bottom:20px">Create Post</button></a>
                </div>
                <h5 class="card-header" style="margin-bottom:20px">Change avatar:</h5>
                <div class="row justify-content-center">
                        <form action="/profile" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-bottom:20px">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection