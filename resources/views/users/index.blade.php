@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="modal-header">
    <h2>Users:</h2>
</div>
<ul>
    <div style="margin-bottom:40px;">
    @foreach ($users as $user)
        <li class="card" style="margin-top: 10px; margin-left:0px; width:250px">
            @if($user->id == auth()->id())
                <a href="{{ route('profile') }}" class="card-header"><img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="40" height="40"/> {{ $user->name }}</a>
            @else
                <a href="{{ route('users.show', ['id' => $user->id]) }}" class="card-header"><img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="40" height="40"/> {{ $user->name }}</a>
            @endif
        </li>
    @endforeach
    </div>
    {{ $users->links() }}
</ul>
@endsection