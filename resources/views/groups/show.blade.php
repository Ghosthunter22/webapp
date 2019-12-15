@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Group</h5>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
                <div class="row justify-content-center">

                        <div class="profile-header-container">
                                <!-- badge -->
                                <h4 class="rank-label-container">
                                    <span class="label label-default rank-label">{{$group->title}}</span>
                                </h4>
                        </div>
            
                    </div>
                    
                <h5 class="card-header">Members:</h5>
                <ul class="card-body">
                    @if(!empty($users))
                    <div>
                        @foreach($users as $user)
                        <div class="card" style="margin-bottom:10px; width:200px; height:40px">
                            <a href="{{ route('users.show', ['id' => $user->id]) }}"><img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="35" height="35"/>{{ $user->name }}</a>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <a>No posts!</a>
                    @endif
                </ul>
                <div class="row justify-content-center">
                        <a href="{{ route('posts.create') }}"><button type="submit" class="btn btn-primary">Create Post</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection