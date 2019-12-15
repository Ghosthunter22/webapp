@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="modal-header">
    <h2>Users:</h2>
</div>
<ul class="pagination" style="width:0px">
    <div class="container" style="margin-top:40px;">
    @foreach ($users as $user)
        <li class="card" style="margin-top: 10px; margin-left:50px; width:250px">
            <a href="{{ route('users.show', ['id' => $user->id]) }}" class="card-header"><img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" width="40" height="40"/>{{ $user->name }}</a>
        </li>
    @endforeach
    </div>
    {{ $users->links() }}
</ul>
@endsection