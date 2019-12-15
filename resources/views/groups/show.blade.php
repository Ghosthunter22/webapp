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
                    @if(!empty($users))
                    <ul class="card-body">
                        <div>
                        @foreach($users as $user)
                            <div class="card" style="margin-bottom:10px; width:200px; height:40px">
                                @if($user->id == auth()->id())
                                <a href="{{ route('profile') }}"><img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="35" height="35"/>{{ $user->name }}</a>
                                @else
                                <a href="{{ route('users.show', ['id' => $user->id]) }}"><img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="35" height="35"/>{{ $user->name }}</a>
                                @endif
                            </div>
                        @endforeach
                        </div>
                        {{ $users->links() }}
                    </ul>
                    @else
                    <a>No posts!</a>
                    @endif
                <div class="row justify-content-center">
                    @if($group->users->find(auth()->id()) == null)
                        <a href="{{ route('groups.join', ['user_id' => auth()->id(), 'group_id' => $group->id]) }}"><button type="submit" class="btn btn-primary">Join Group</button></a>
                    @else
                        <a href="{{ route('groups.leave', ['user_id' => auth()->id(), 'group_id' => $group->id]) }}"><button type="submit" class="btn btn-primary">Leave Group</button></a>
                    @endif
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection